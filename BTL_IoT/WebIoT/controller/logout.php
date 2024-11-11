<?php
    // header("Location: index.php");
    unset($_SESSION['role']);
    unset($_SESSION['username']);
    unset($_SESSION['avata']);
    unset($_SESSION['fullname']);
    unset($_SESSION['led1']);
    unset($_SESSION['led2']);
    unset($_SESSION['led3']);
    unset($_SESSION['led4']);
    unset($_SESSION['led5']);
    unset($_SESSION['buzzer']);
    unset($_SESSION['auto']);
    header("Location: index.php");
?>