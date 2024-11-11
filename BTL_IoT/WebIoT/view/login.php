
<div class="container mt-3" style="background-color: white; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 60px;">
  <form action="index.php?act=login" method="post">
    <!-- <h2 style="text-align: center; margin-top: 100px;">Đăng nhập</h2> -->
    <h1 style="text-align: center; margin-top: 100px;">Login</h1>
    <div class="mb-3 mt-3">
      <!-- <label for="username" class="form-label">Tên đăng nhập:</label>
      <input type="text" class="form-control" id="username" placeholder="Nhập vào tên đăng nhập" name="username"> -->
      <label for="username" class="form-label">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
    <div class="mb-3">
      <!-- <label for="password" class="form-label">Mật khẩu:</label>
      <input type="password" class="form-control" id="password" placeholder="Nhập vào mật khẩu" name="password"> -->
      <label for="password" class="form-label">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <div class="form-check mb-4">
      <label class="form-check-label">
        <!-- <input class="form-check-input" type="checkbox" name="remember"> Ghi nhớ -->
        <input class="form-check-input" type="checkbox" name="remember"> Remember
      </label>
    </div>
    <!-- <input type="submit" class="btn btn-danger" name="login" value="Đăng nhập">
    <button class="btn bg-danger"><a href="index.php" style="text-decoration: none; color: white;">Quay lại trang chủ</a></button> -->
    <input type="submit" class="btn btn-danger text-light" name="login" value="Login">
    <input type="button" class="btn btn-danger text-light" name="register" value="Register" onclick="window.location.href='index.php?act=register';">
    <button class="btn bg-danger"><a href="index.php" style="text-decoration: none; color: white;">Return</a></button>
  </form>
</div>