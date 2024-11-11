<?php
include "../model/database.php";
include "../model/data.php";
header('Content-Type: application/json');
$kq = get_all_data_desc();
echo json_encode($kq);
?>
