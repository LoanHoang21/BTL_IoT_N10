<?php
    // Đặt múi giờ thành GMT+7 (Asia/Ho_Chi_Minh)
    // date_default_timezone_set('Asia/Ho_Chi_Minh');
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
?>
