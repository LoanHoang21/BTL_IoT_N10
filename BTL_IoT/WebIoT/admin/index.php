<?php
    session_start();
    // ob_start();
    // include "../controller/phpMQTT.php";
    include "./model/database.php";
    include "./model/user.php";
    include "./model/data.php";

    include "./view/header.php";
;   
    if(isset($_GET['act'])){
        switch($_GET['act']){

            case 'detail_infor':
              include "./controller/detail_infor.php";
              break;
            
            case 'change_password':
                include "./controller/change_password.php";
                break;
            
            case 'history_data':
              include "./view/history_data.php";
              break;

            case 'control_device':
              include "./controller/mqtt_control.php";
              break;
            
            case 'logout':
              include "../index.php?act=logout";
              break;

            default:
              include "./view/home.php";
              break;
          }
    }else{
        include "./view/home.php";
    }
    include "./view/footer.php";
?>
