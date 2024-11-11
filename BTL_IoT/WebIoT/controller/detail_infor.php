<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $detail_user = get_user_infor($username);
    include "./view/form_detail_user.php";
    if ((isset($_POST['update'])) && ($_POST['update'])) {
        $fullname = $_POST['fullname'];
        $birthday = $_POST['birthday'];
        $gender = $_POST["gender"] ?? "";
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $avata_file = "";
        if ($_FILES['avata']['name'] != "") {
            $target_file = basename($_FILES['avata']['name']);

            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
                $uploadOk = 0;
            }
            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES["avata"]["tmp_name"], $target_file)) {
                    $avata_file = $target_file;
                    // echo $avata;
                } else {
                    echo "Upload file failed!";
                }
            }
        }

        update_user($username, $fullname, $birthday, $gender, $phone, $email, $avata_file);
    } else if ((isset($_POST['change_password'])) && ($_POST['change_password'])) {
        header("Location: index.php?act=change_password");
    }
}
