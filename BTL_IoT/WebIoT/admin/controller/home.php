<?php
include "./model/database.php";
include "./model/data.php";
header('Content-Type: application/json'); 

// $kq = get_all_data();
$kq = get_15_data();

$timeArray = [];
$temperatureArray = [];
$humidityArray = [];
$windArray = [];
$pressureArray = [];
$lightArray = [];
$rainArray = [];
foreach ($kq as $temp) {
  $timeArray[] = $temp['time'];
  $temperatureArray[] = (float) $temp['temperature'];
  $humidityArray[] = (float) $temp['humidity'];
  $windArray[] = (float) $temp['wind_speed'];
  $pressureArray[] = (float) $temp['pressure'];
  $lightArray[] = (float) $temp['light_intensity'];
  $rainArray[] = (float) $temp['percent_rain'];
}

$kq1 = get_latest_data();
$latestData = !empty($kq1) ? $kq1[0] : [];

// Tạo mảng kết quả
$result = [
  'timeArray' => $timeArray,
  'temperatureArray' => $temperatureArray,
  'humidityArray' => $humidityArray,
  'windArray' => $windArray,
  'pressureArray' => $pressureArray,
  'lightArray' => $lightArray,
  'rainArray' => $rainArray,
  'latest_data' => $latestData 
];
echo json_encode($result);
?>
