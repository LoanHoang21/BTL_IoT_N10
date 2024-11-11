<?php

include "D:/xampp/htdocs/IoT/controller/phpMQTT.php";

$server = "192.168.1.164";     // Địa chỉ MQTT Broker (Mosquitto)
$port = 1883;
$client_id = "PHP_MQTT_Control";

$mqtt = new phpMQTT($server, $port, $client_id);

if (!$mqtt->connect(true, NULL)) {
  //   exit(1);
  echo "Connect to MQTT Broker failed!";
  exit("Unable to connect to MQTT Broker!\n");
} else {
  // echo "Kết nối thành công";
}
$topics['device/status'] = array("qos" => 0, "function" => "procMsg");
$mqtt->subscribe($topics, 0);

function procMsg($topic, $msg)
{
  list($led1, $led2, $led3, $led4, $led5, $buzzer, $auto) = explode(",", $msg);
  $_SESSION['led1'] = $led1 ?? '';
  $_SESSION['led2'] = $led2 ?? '';
  $_SESSION['led3'] = $led3 ?? '';
  $_SESSION['led4'] = $led4 ?? '';
  $_SESSION['led5'] = $led5 ?? '';
  $_SESSION['buzzer'] = $buzzer ?? '';
  $_SESSION['auto'] = $auto ?? '';
}
// $mqtt->proc();
$counter = 0;  // Biến đếm số lần gọi proc()

// Lặp tối đa 15 lần
while ($mqtt->proc() && $counter < 15) {
  $counter++;  // Tăng biến đếm
  // echo "Đã gọi proc() lần thứ $counter\n";  // Debugging output
}

// echo $_SESSION["temperature"] . "," . $_SESSION["humidity"] . "," . $_SESSION["wind_speed"] . "," . $_SESSION["pressure"] . "," . $_SESSION["light_intensity"] . "," . $_SESSION["percent_rain"] . "," . $_SESSION["weather"];
include "./view/control_device.php";

// echo "Received ESP32: " . $_SESSION["led1"] . "," . $_SESSION["led2"] . "," . $_SESSION["led3"] . "," . $_SESSION["led4"] . "," . $_SESSION["led5"] . "," . $_SESSION["buzzer"] . "," . $_SESSION["auto"]; // Debugging output

if (
  isset($_POST['LED1']) || isset($_POST['LED2']) || isset($_POST['LED3']) || isset($_POST['LED4'])
  || isset($_POST['LED5']) || isset($_POST['buzzer']) || isset($_POST['auto'])
) {
  $led1 = $_POST['LED1'] ? '1' : '0';
  $led2 = $_POST['LED2'] ? '1' : '0';
  $led3 = $_POST['LED3'] ? '1' : '0';
  $led4 = $_POST['LED4'] ? '1' : '0';
  $led5 = $_POST['LED5'] ? '1' : '0';
  $buzzer = $_POST['buzzer'] ? '1' : '0';
  $auto = $_POST['auto'] ? '1' : '0';
  $payload1 = $led1 . "," . $led2 . "," . $led3 . "," . $led4 . "," . $led5 . "," . $buzzer . "," . $auto;
  $mqtt->publish("esp32/control", $payload1, 0);
  echo "Received web publish: " . $payload1;
} else {
  // echo "No POST data received"; // Debugging output
}

$mqtt->close();
