<?php
    include "./view/login.php";
    if((isset($_POST['login'])) && ($_POST['login'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $kq = check_user($username, $password);
      // echo $kq[0]['role'];
      if ($kq != null) {
        $role = $kq[0]['role'];
        $_SESSION['role'] = $role;
        if ($role == 1) {
            $_SESSION['username'] = $kq[0]['username'];
            $_SESSION['avata'] = $kq[0]['avata'];
            $_SESSION['fullname'] = $kq[0]['fullname'];
            header("Location: admin/index.php");
        } else if ($role == 0) {
            $_SESSION['username'] = $kq[0]['username'];
            $_SESSION['avata'] = $kq[0]['avata'];
            $_SESSION['fullname'] = $kq[0]['fullname'];
            header("Location: index.php");
        } else {
            header("Location: index.php");
        }
      } else {
        echo '<script>
                  alert("Wrong username or password");
                  window.location.href = "index.php?act=login";
              </script>';
      }
    }
?>