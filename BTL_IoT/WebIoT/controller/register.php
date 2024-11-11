<?php
include "./view/register.php";
if ((isset($_POST['register'])) && ($_POST['register'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $fullname = $_POST['fullname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $birthday = $_POST['birthday'];
  $gender = $_POST['gender'];
  if ($password != $confirmPassword) {
    echo '<script>
            // alert("Mật khẩu xác nhận không khớp");
            alert("Confirmation password does not match");
            window.location.href = "index.php?act=register";
          </script>';
  } else {
    $kq = user_exit($username);
    // echo $kq[0]['role'];
    if ($kq != null) {
      echo '<script>
                  // alert("Tên đăng nhập đã được sử dụng. Mời chọn tên khác");
                  alert("Username is already in use. Please choose another name.");
                  window.location.href = "index.php?act=register";
              </script>';
    } else {
      add_user($username, $password, $fullname, $birthday, $gender, $phone, $email);
    }
  }
}
