
<div class="container mt-3" style="background-color: white; height: 100%; display: flex; justify-content: center; align-items: center; padding-bottom: 50px;">
  <form action="index.php?act=change_password" method="post">
    <h2 style="text-align: center; margin-top: 100px;">Change Password</h2>
    <div class="mb-3 mt-3">
      <label for="password" class="form-label">Old password:</label>
      <input type="text" class="form-control" id="password" placeholder="Enter old password" name="password" required>
    </div>
    <div class="mb-3">
      <label for="passnew" class="form-label">New password:</label>
      <input type="password" class="form-control" id="passnew" placeholder="Enter new password" name="passnew" required>
    </div>
    <div class="mb-3">
        <label for="confirmPass" class="form-label">Confirm new password:</label>
        <input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Confirm new password" required>
    </div>
    <input type="submit" class="btn btn-danger" name="change_password" value="Save">
    <button class="btn btn-danger"><a href="index.php" style="text-decoration: none; color: white;">Return</a></button>
  </form>
</div>