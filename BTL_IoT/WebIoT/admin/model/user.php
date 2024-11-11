<?php

function user_exit($username)
{
    $conn = connectdb();
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    return $kq;
}

function check_user($username, $password)
{
    $conn = connectdb();
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    return $kq;
}

function get_user_infor($username)
{
    $conn = connectdb();
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $kq = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $kq[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    return $kq;
}

function update_password($username, $passwordNew)
{
    $conn = connectdb();

    $sql = "UPDATE users SET password = '$passwordNew' WHERE username = '$username';";

    $success = mysqli_multi_query($conn, $sql);
    mysqli_close($conn);
    if ($success) {
        echo '<script>
                    alert("Password updated successfully");
                    window.location.href = "index.php?act=change_password";
                </script>';
    } else {
        echo '<script>
                    alert("Password update failed");
                    window.location.href = "index.php?act=change_password";
                </script>';
    }
}

function add_user($username, $password, $fullname, $birthday, $gender, $phone, $email)
{
    $conn = connectdb();

    $sql = "INSERT INTO users (username, password, fullname, birthday, gender, phone, email) 
            VALUES ('$username', '$password', '$fullname', '$birthday', '$gender', '$phone', '$email');";

    $success = mysqli_query($conn, $sql);

    if ($success) {
        echo '<script>
                alert("Account created successfully");
                window.location.href = "index.php?act=login";
              </script>';
    } else {
        echo '<script>
                alert("Account creation failed");
                window.location.href = "index.php?act=register";
              </script>';
    }
}

function update_user($username, $fullname, $birthday, $gender, $phone, $email, $avata_file)
{
    $conn = connectdb();
    if ($avata_file != "") {
        if($_SESSION['role']==1){
            $avata = "../uploads/images/" . $avata_file;
        }else{
            $avata = "./uploads/images/" . $avata_file;
        }
        $sql = "UPDATE users SET avata = '$avata' WHERE username = '$username';";
    }
    $sql .= "UPDATE users 
                SET fullname = '$fullname', birthday = '$birthday', 
                    gender = '$gender', phone = '$phone', email = '$email'
                    WHERE username = '$username';";
    $success = mysqli_multi_query($conn, $sql);

    if ($success) {
        echo '<script>
                    alert("Information updated successfully");
                    window.location.href = "index.php?act=detail_infor";
                </script>';
    } else {
        echo '<script>
                    alert("Information update failed");
                    window.location.href = "index.php?act=detail_infor";
                </script>';
    }
}
