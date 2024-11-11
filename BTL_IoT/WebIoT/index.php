<?php

    session_start();
    ob_start();

    // DELETE from data;ALTER TABLE data AUTO_INCREMENT = 1;
    // exec('php "D:/xampp/htdocs/IoT/controller/receive_data.php" &');

    include "./model/database.php";
    include "./model/user.php";
    include "./model/data.php";

    include "./view/header.php";

    if(isset($_GET['act'])){
        switch($_GET['act']){
            case 'register':
              include "./controller/register.php";
              break;
            case 'login':
              include "./controller/login.php";
              break;
            case 'detail_infor':
              include "./controller/detail_infor.php";
              break;
            case 'change_password':
              include "./controller/change_password.php";
              break;
            case 'history_data':
              include "./view/history_data.php";
              break;   
            case 'logout':
              include "./controller/logout.php";
              break;
            default:
              include "./view/home.php";
              // include "./controller/receive_data.php";
              break;
          }
    }else{
        include "./view/home.php";
        // include "./controller/receive_data.php";
    }
    include "./view/footer.php";
?>