<?php
include "D:/xampp/htdocs/IoT/controller/phpMQTT.php";// Thư viện MQTT cho PHP
include "D:/xampp/htdocs/IoT/model/data.php"; 
include "D:/xampp/htdocs/IoT/model/database.php";    

$server = "192.168.1.164";     // Địa chỉ MQTT Broker (Mosquitto)
$port = 1883;                  // Cổng MQTT
$client_id = "PHP_ReceiveData"; // ID client cho PHP

// Kết nối MQTT
$mqtt = new phpMQTT($server, $port, $client_id);

if(!$mqtt->connect(true, NULL)) {
    exit("Không thể kết nối đến MQTT Broker!\n");
}

// Đăng ký chủ đề cần nhận
$topics['topic/sensor'] = array("qos" => 2, "function" => "procMsg");
$mqtt->subscribe($topics, 0);

// Hàm xử lý khi có dữ liệu từ MQTT
function procMsg($topic, $msg) {
    echo "Dữ liệu nhận từ chủ đề [$topic]: $msg\n";
    
    // Tách dữ liệu từ chuỗi nhận được
    list($temperature, $humidity, $wind_speed, $pressure, $light_intensity, $percent_rain, $weather_type) = explode(",", $msg);

    // Gọi hàm insert_data từ file data.php
    insert_data($temperature, $humidity, $wind_speed, $pressure, $light_intensity, $percent_rain, $weather_type);
}

// $mqtt->proc();

// Lắng nghe dữ liệu từ MQTT
while($mqtt->proc()) {
    usleep(200000); // Đợi 2 giây (2000000 microseconds)
}

$mqtt->close();
?>
