<!DOCTYPE html>
<html lang="vn">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PTIT</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" type="text/css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

  <script src="https://kit.fontawesome.com/ce4d3b4453.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- <link rel="stylesheet" href="../utils/styles/styles_header.css"> -->
  <script src="script.js"></script>
  <style>
    body {
      background-color: #d6dde0;
    }

    .navbar {
      background-color: black;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1001;
    }

    .nav-link:hover {
      background: red;
      color: white;
    }

    .nav-link {
      color: white;
    }

    .dropdown-menu {
      z-index: 1002;
    }

    .dropdown-item:hover {
      background-color: black;
      color: white;
    }

    /* .dropdown-item.active, */
    .dropdown-item:active {
      background-color: red;
      color: white;
    }

    .contents {
      margin-left: 48px;
      margin-right: 48px;
      text-align: justify;
    }

    .col-sm-3 {
      padding: 24px;
      color: white;
    }

    .mycontainer {
      margin-left: 48px;
      margin-right: 48px;
    }

    h3 {
      padding-top: 40px;
    }

    .col-sm-4:hover .boder {
      border: 1.5px solid rgb(141, 17, 17);
      border-radius: 4px;
    }

    .question p {
      border: 1.5px solid rgb(174, 169, 169);
      border-radius: 4px;
      box-shadow: 2px;
      padding: 20px;
      margin-left: 50px;
      margin-right: 50px;
    }

    .question p:hover {
      background-color: rgb(141, 17, 17);
      color: white;
    }

    .no-hover:hover {
      background: none !important;
      color: inherit !important;
    }

    .form-control {
      border: 1px solid black;
    }

    /* Đặt hiệu ứng khi hover vào ảnh */
    .image-hover-zoom {
      transition: transform 0.3s ease;
      /* Thời gian và kiểu chuyển tiếp */
    }

    .image-hover-zoom:hover {
      transform: scale(1.1);
      /* Phóng to lên 1.1 lần */
    }

    .social-icons {
      display: flex;
      /* Sử dụng flexbox để tạo hàng */
      justify-content: center;
      gap: 30px;
      /* margin-right: 150px; */
      /* Cách đều các biểu tượng */
      /* margin-top: 10px; */
      /* Khoảng cách phía trên để tạo không gian */
    }

    .social-icons a {
      text-decoration: none;
    }

    .social-icons .instagram {
      background: linear-gradient(45deg, #FFD700, #FF0000, #D5006D, #6A1B9A);
      /* Gradient từ tím sang vàng nhạt và cam */
      display: inline-block;
      /* Hiển thị dưới dạng khối nội tuyến */
      -webkit-background-clip: text;
      /* Cắt nền cho văn bản */
      -webkit-text-fill-color: transparent;
      /* Làm cho màu văn bản trong suốt */
      font-size: 24px;
      /* Kích thước biểu tượng */
    }

    .data-block {
      background-color: white;
      border: 1px solid rgb(178, 189, 198);
      padding: 25px 15px;
      border-radius: 8px;
      box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
      /* Tạo hiệu ứng đổ bóng */
      /* margin-bottom: 10px; */
    }

    .data-block p {
      margin: 0;
    }

    .data-block1 {
      background-color: white;
      border: 1px solid rgb(178, 189, 198);
      padding: 40px 15px;
      border-radius: 8px;
      box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
      /* Tạo hiệu ứng đổ bóng */
      /* margin-bottom: 10px; */
    }

    .data-block1 p {
      margin: 0;
    }

    .card-body {
      padding-bottom: 0px;
      border: 1px solid rgb(178, 189, 198);
      border-radius: 8px;
      box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.2);
    }
    .form-switch {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    input[type="checkbox"] {
      appearance: none;
      width: 40px;
      height: 20px;
      background: #ccc;
      border-radius: 20px;
      position: relative;
      cursor: pointer;
    }
    input[type="checkbox"]:checked {
      background: #4caf50;
    }
  </style>

</head>

<body>
  <nav class="navbar navbar-expand sticky-top">
    <a class="navbar-brand ms-4 d-flex" href="index.php">
      <img src="../utils/images/favicon.jpg" width="40px">
      <h5 margin="0px" style="width: 62.8334px; height: 31.3334px; color: white; transform: translate(12.6667px, 10px);">PTIT</h5>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar"></button>
    <div class="collapse navbar-collapse ms-auto" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item me-3 active">
          <!-- <a class="nav-link" href="index.php">Trang Chủ</a> -->
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <?php
        if (isset($_SESSION['username']) && ($_SESSION['username'] != "")) {
          echo '<li class="nav-item me-3">
                  <a class="nav-link" href="index.php?act=history_data">History Data</a>
                </li>
                <li class="nav-item me-3">
                  <a class="nav-link" href="index.php?act=control_device">Control Device</a>
                </li>';
        }
        ?>
    </div>
    <ul class="navbar-nav ms-auto">
      <?php
      if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
        echo '<li class="nav-item me-3">
                  <a class="nav-link no-hover" href="index.php?act=detail_infor"><img src="' . $_SESSION['avata'] . '" class="rounded-circle" alt="avata.png" width="25" height="25"></a>
                </li>';

        echo '<li class="nav-item dropdown me-3">
                  <a class="nav-link dropdown-toggle" href="index.php?act=detail_infor" role="button" data-bs-toggle="dropdown">' . $_SESSION['fullname'] . '</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php?act=detail_infor"><i class="bi bi-person fs-5"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="index.php?act=change_password"><i class="bi bi-person-lock fs-5"></i> Change password</a></li>
                  </ul>
                </li>';

        echo '<li class="nav-item me-3">
                  <a class="nav-link" href="../index.php?act=logout"><i class="bi bi-box-arrow-in-right"></i>   Logout</a>
                </li>';
      } else {
        echo '<li class="nav-item me-3">
                <a class="nav-link" href="../index.php?act=login"><i class="bi bi-box-arrow-in-right"></i>   Login</a>
              </li>';
        echo '<li class="nav-item me-3">
                <a class="nav-link" href="../index.php?act=register"><i class="fas fa-user-alt"></i> Register</a>
              </li>';
      }
      ?>
    </ul>
  </nav>