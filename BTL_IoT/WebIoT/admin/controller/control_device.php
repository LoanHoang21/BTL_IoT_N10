<?php
include "D:/xampp/htdocs/IoT/model/database.php";
include "D:/xampp/htdocs/IoT/model/data.php";
// header('Content-Type: application/json'); // Đặt tiêu đề cho kiểu dữ liệu trả về
// $kq = get_all_data();
// $timeArray = [];
// $temperatureArray = [];
// $humidityArray = [];
// $windArray = [];
// $pressureArray = [];
// $lightArray = [];
// $rainArray = [];
// foreach ($kq as $temp) {
//   $timeArray[] = $temp['time'];
//   $temperatureArray[] = (float) $temp['temperature'];
//   $humidityArray[] = (float) $temp['humidity'];
//   $windArray[] = (float) $temp['wind_speed'];
//   $pressureArray[] = (float) $temp['pressure'];
//   $lightArray[] = (float) $temp['light_intensity'];
//   $rainArray[] = (float) $temp['percent_rain'];
// }
function connectdb(){
  $servername = "localhost";
  $username = "loan";
  $password = "123";
  $dataname = "webiot";
  $conn = new mysqli($servername, $username, $password, $dataname);
  mysqli_set_charset($conn, "utf8mb4");

  if($conn->connect_error) {
      die($conn->connect_error);
  } else {
      // echo "Success";
  }
  return $conn;
}
function get_latest_data(){
  $conn = connectdb();
  $sql = "SELECT * FROM data ORDER BY id DESC LIMIT 1;";
  $result = mysqli_query($conn, $sql);
  $kq = [];
  while ($row = mysqli_fetch_assoc($result)) {
      $kq[] = $row; // Thêm hàng vào mảng
  }
  mysqli_free_result($result);
  return $kq;
}
$kq1 = get_latest_data();
// $latestData = !empty($kq1) ? $kq1[0] : []; // Lấy hàng đầu tiên nếu có dữ liệu
// // Tạo mảng kết quả
// $result = [
//   'latest_data' => $latestData // Bao gồm dữ liệu mới nhất
// ];

// Chuyển đổi mảng kết quả thành JSON và in ra
// var_dump($kq1);
// // Tạo mảng kết quả
// $result = [
//   'timeArray' => $timeArray,
//   'temperatureArray' => $temperatureArray,
//   'humidityArray' => $humidityArray,
//   'windArray' => $windArray,
//   'pressureArray' => $pressureArray,
//   'lightArray' => $lightArray,
//   'rainArray' => $rainArray,
//   // 'latest_data' => $kq1 // Bao gồm dữ liệu mới nhất
//   'latest_data' => $latestData // Bao gồm dữ liệu mới nhất
// ];

// // Chuyển đổi mảng kết quả thành JSON và in ra
// echo json_encode($result);
// exit;
// include "D:/xampp/htdocs/IoT/admin/view/control_device.php";
?>
