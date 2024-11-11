<div class="container mt-3" style="background-color: white; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 40px; width: 100%;"> 
  <form action="" method="post" style="width: 90%;">
    <!-- <h2 style="text-align: center; margin-top: 75px;">Đăng ký</h2> -->
    <h2 style="text-align: center; margin-top: 75px;">Register</h2>
    <div class="row mb-4 mt-4">
      <div class="col-md-6">
        <!-- <label for="username" class="form-label">Tên đăng nhập:</label>
        <input type="text" class="form-control" id="username" placeholder="Nhập vào tên đăng nhập" name="username" required> -->
        <label for="username" class="form-label">Username<span style="color: red; font-size: 20px;">*</span>:</label>
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
      </div>
      <div class="col-md-3">
        <!-- <label for="password" class="form-label">Mật khẩu:</label>
        <input type="password" class="form-control" id="password" placeholder="Nhập vào mật khẩu" name="password" required> -->
        <label for="password" class="form-label">Password<span style="color: red; font-size: 20px;">*</span>:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
      </div>
      <div class="col-md-3">
        <!-- <label for="confirmPassword" class="form-label">Xác nhận mật khẩu</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Xác nhận mật khẩu" required> -->
        <label for="confirmPassword" class="form-label">Confirm password<span style="color: red; font-size: 20px;">*</span>:</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm password" required>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-md-6">
        <!-- <label for="fullname" class="form-label">Họ và tên:</label>
        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nhập vào họ tên" required> -->
        <label for="fullname" class="form-label">Name display<span style="color: red; font-size: 20px;">*</span>:</label>
        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter name display" required>
      </div>
      <div class="col-md-6">
        <!-- <label for="phone" class="form-label">Số điện thoại:</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Nhập vào số điện thoại [0-9]+"> -->
        <label for="phone" class="form-label">Phone number<span style="color: red; font-size: 20px;"></span>::</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number [0-9]+">
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-md-5">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="abc@mail.com,...">
      </div>
      <div class="col-md-4">
        <!-- <label for="birthday" class="form-label">Ngày sinh:</label> -->
        <label for="birthday" class="form-label">Birthday:</label>
        <input type="date" class="form-control" id="birthday" name="birthday" >
      </div>
      <div class="col-md-3" style="padding-left: 50px;">
        <!-- <label class="form-label">Giới tính:</label><br>
        <div class="mt-2">
          <input type="radio" id="nam" name="gender" value="Nam">
          <label for="nam">Nam</label>
          <input type="radio" id="nu" name="gender" value="Nữ">
          <label for="nu">Nữ</label>
          <input type="radio" id="khac" name="gender" value="Khác">
          <label for="khac">Khác</label>
        </div> -->
        <label class="form-label">Gender:</label><br>
        <div class="mt-2 mb-4">
          <input type="radio" id="nam" name="gender" value="Nam">
          <label for="nam">Male</label>
          <input type="radio" id="nu" name="gender" value="Nữ">
          <label for="nu">Female</label>
          <input type="radio" id="khac" name="gender" value="Khác">
          <label for="khac">Other</label>
        </div>
      </div>
    </div>
    <div class="text-center d-flex justify-content-center" style="gap: 40px;">
      <!-- <input type="submit" class="btn btn-danger text-light" name="register" value="Đăng ký" style="padding: 8px 35px;">
      <input type="submit" class="btn btn-danger text-light" name="login" value="Đăng nhập" style="padding: 8px 25px;" onclick="window.location.href='index.php?act=login';">
      <input type="button" class="btn btn-danger text-light" name="return" value="Quay lại" style="padding: 8px 35px;" onclick="window.location.href='index.php';"> -->
      <input type="submit" class="btn btn-danger text-light" name="register" value="Register" style="padding: 8px 35px;">
      <input type="submit" class="btn btn-danger text-light" name="login" value="Login" style="padding: 8px 25px;" onclick="window.location.href='index.php?act=login';">
      <input type="button" class="btn btn-danger text-light" name="return" value="Return" style="padding: 8px 35px;" onclick="window.location.href='index.php';">
    </div>
    <!-- <input type="submit" class="btn btn-danger" name="register" value="Đăng ký"> -->
    <!-- <button type="button" class="btn btn-danger"><a href="DangKy.html" style="text-decoration: none; color: white;">Đăng ký</a></button> -->
    <!-- <button class="btn bg-danger"><a href="index.php" style="text-decoration: none; color: white;">Quay lại trang chủ</a></button> -->
  </form>
</div>
