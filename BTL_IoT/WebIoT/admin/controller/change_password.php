<?php
    include "./view/change_password.php";
    if((isset($_POST['change_password'])) && ($_POST['change_password'])){
      $kq = get_user_infor($_SESSION['username']);
      // echo $kq[0]['user'], $kq[0]['pass'], $kq[0]['fullname'];
      $username = $kq[0]['username'];
      $password = $_POST['password'];
      $passnew = $_POST['passnew'];
      $confirmPass = $_POST['confirmPass'];
      if($password != $kq[0]['password']){
        echo '<script>
                      alert("Enter old password incorrect");
                      window.location.href = "index.php?act=change_password";
                  </script>';
      }else{
        if($passnew != $confirmPass){
          echo '<script>
                    alert("Confirm new password");
                    window.location.href = "index.php?act=change_password";
                </script>';
        }else{
          update_password($username, $passnew);
        }
      }
    }
?>