<div class="contents" style="background-color: white;">
        <div class="row d-flex justify-content-center align-content-center">
            <div class="col-sm-5">
                <div class="container" style="max-width: auto;">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h3><br></h3>
                        <div class="mb-3 text-center">
                            <img src="<?= $detail_user[0]['avata'] ?>" alt="Avatar" width="250px" height="300px" class="img-fluid">
                        </div>
                        <div class="mb-3 text-center">
                            <h4><?= $detail_user[0]['fullname'] ?></h4>
                            <?php
                                if ($detail_user[0]['role'] == 0) {
                                    echo "<<< User >>>";
                                } else if ($detail_user[0]['role'] == 1) {
                                    echo "<<< Admin >>>";
                                }
                            ?>
                        </div>                        
                        <div class="mb-3" style="font-size: 16px; padding-left: 100px;">
                            <p class="pt-3"><i class="bi bi-person"> </i><?= $detail_user[0]['username'] ?></p>
                            <p><i class="bi bi-telephone"> </i><?= $detail_user[0]['phone'] ?></p>
                            <p><i class="bi bi-envelope-at"> </i><?= $detail_user[0]['email'] ?></p>
                            <p><i class="bi bi-cake2"> </i><?= $detail_user[0]['birthday'] ?></p>
                            <p><i class="bi bi-gender-male"> </i><?= $detail_user[0]['gender'] ?></p>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-7">
                <div class="container" style="max-width: auto;">
                    <h3 class="mt-5 mb-4 text-center">Information Details</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="avata" class="form-label">Avata:</label><br>
                            <img src="<?= $detail_user[0]['avata'] ?>" width="150px"><br>
                            <input type="button" style="margin-top: 5px; width: 100px; height: 30px;" value="Chọn ảnh" onclick="document.getElementById('avata').click();">
                            <input type="file" id="avata" name="avata" style="display: none;">
                            <!-- <span id="file-name" style="margin-left: 10px;">Không có tệp nào được chọn</span> -->
                            <span id="file-name" style="margin-left: 10px;">No files is selected</span>
                            <script>
                                var fileInput = document.getElementById('avata');
                                var fileNameSpan = document.getElementById('file-name');

                                fileInput.addEventListener('change', function () {
                                    if (fileInput.files.length > 0) {
                                        fileNameSpan.textContent = fileInput.files[0].name;
                                    } else {
                                        // fileNameSpan.textContent = "Không có tệp nào được chọn";
                                        fileNameSpan.textContent = "No files is selected";
                                    }
                                });
                            </script>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-5">
                                <!-- <label for="username" class="form-label">Tên đăng nhập:</label> -->
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?=$detail_user[0]['username']?>" required readonly>
                            </div>
                            <div class="col-sm-7">
                                <!-- <label for="password" class="form-label">Mật khẩu:</label> -->
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?=$detail_user[0]['password']?>" required readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <!-- <label for="fullname" class="form-label">Họ và tên:</label> -->
                            <label for="fullname" class="form-label">Name display:</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $detail_user[0]['fullname'] ?>" required>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-5">
                                <!-- <label for="phone" class="form-label">Số điện thoại:</label> -->
                                <label for="phone" class="form-label">Phone number:</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="<?= $detail_user[0]['phone'] ?>">
                            </div>
                            <div class="col-sm-7">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $detail_user[0]['email'] ?>" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <!-- <label for="birthday" class="form-label">Ngày sinh:</label> -->
                            <label for="birthday" class="form-label">Birthday:</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="<?= $detail_user[0]['birthday'] ?>">
                        </div>
                        <div class="mb-3">
                            <?php
                                $currentGender = $detail_user[0]['gender'];
                                $isMaleChecked = ($currentGender === 'Nam') ? 'checked' : '';
                                $isFemaleChecked = ($currentGender === 'Nữ') ? 'checked' : '';
                                $isOtherChecked = ($currentGender === 'Khác') ? 'checked' : '';
                            ?>
                            <div class="mb-3">
                                <!-- <label class="form-label">Giới tính:</label><br> -->
                                <label class="form-label">Gender:</label><br>
                                <input type="radio" id="nam" name="gender" value="Nam" <?= $isMaleChecked ?>>
                                <!-- <label for="nam">Nam</label> -->
                                <label for="nam">Male</label>
                                <input type="radio" id="nu" name="gender" value="Nữ" <?= $isFemaleChecked ?>>
                                <!-- <label for="nu">Nữ</label> -->
                                <label for="nu">Female</label>
                                <input type="radio" id="khac" name="gender" value="Khác" <?= $isOtherChecked ?>>
                                <!-- <label for="khac">Khác</label> -->
                                <label for="khac">Other</label>
                            </div>
                        </div>
                        <!-- <input type="submit" class="btn btn-danger text-light" name="update" value="Cập nhật" style="margin-left: 120px;"> -->
                        <input type="submit" class="btn btn-danger text-light" name="update" value="Update" style="margin-left: 120px;">
                        <!-- <input type="button" class="btn btn-danger text-light ms-4" name="change_password" value="Đổi mật khẩu" style="margin-left: 120px;" onclick="window.location.href='index.php?act=change_password';"> -->
                        <input type="button" class="btn btn-danger text-light ms-4" name="change_password" value="Change password" style="margin-left: 120px;" onclick="window.location.href='index.php?act=change_password';">
                        <!-- <input type="button" class="btn btn-danger text-light ms-4" name="return" value="Quay lại" style="margin-left: 120px;" onclick="window.location.href='index.php';"> -->
                        <input type="button" class="btn btn-danger text-light ms-4" name="return" value="Return" style="margin-left: 120px;" onclick="window.location.href='index.php';">
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
