<?php

function get_all_data(){
    $conn = connectdb();
    $sql = "SELECT * FROM data";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($conn); 
    return $kq;
}

function get_15_data() {
    $conn = connectdb();
    $sql = "SELECT * FROM data ORDER BY id DESC LIMIT 15"; 
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    return array_reverse($kq); 
}

function get_all_data_desc(){
    $conn = connectdb();
    $sql = "SELECT * FROM data ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row; 
    }
    mysqli_free_result($result);
    mysqli_close($conn); 
    return $kq;
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
    mysqli_close($conn); // Đóng kết nối sau khi truy vấn xong
    return $kq;
}

function insert_data($temperature, $humidity, $wind_speed, $pressure, $light_intensity, $percent_rain, $weather_type){
    $conn = connectdb();
    $sql = "INSERT INTO data(temperature, humidity, wind_speed, pressure, light_intensity, percent_rain, weather_type) 
            VALUES ($temperature, $humidity, $wind_speed, $pressure, $light_intensity, $percent_rain, $weather_type);";
    $success = mysqli_multi_query($conn, $sql);
    mysqli_close($conn); // Đóng kết nối sau khi truy vấn xong
    if ($success) {
        echo "Cập nhật dữ liệu thành công";
        // echo '<script>
        //         alert("Information updated successfully");
        //         window.location.href = "index.php?act=history_data";
        //     </script>';
    } else {
        echo "Cập nhật dữ liệu thất bại";
        // echo '<script>
        //         alert("Update information failed");
        //         window.location.href = "index.php?act=history_data";
        //     </script>';
    }
}

?>