<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion_store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
        <!-- Link vào đây khi thêm file css  -->
    <link rel="stylesheet" href="public/css/mainkey.css">
    <link rel="stylesheet" href="public/css/body_index_2.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/base.css">
    
    
    <script src="https://kit.fontawesome.com/95b5cd4c14.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- Block Element Modifier - BEM -->
    <div class="app">
        <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item-qr header__navbar-item--separate">
                            Vào cửa hàng trên ứng dụng Fashion Store

                            <!-- header QR code -->
                            <div class="header__qr">
                                <img src="image/QR.png" alt="QR code" class="header__qr-img">
                                <div class="header__qr-apps">
                                    <a href="" class="header__qr-link">
                                        <img src="image/gg_play.png" alt="Google play" class="header__qr-download-img">
                                    </a>

                                    <a href="" class="header__qr-link">
                                        <img src="image/app_store.png" alt="App Store" class="header__qr-download-img">
                                    </a>
                                </div>
                            </div>

                        </li>
                        <li class="header__navbar-item">
                            <span class="header__navbar-title--no-poiter">Kết nối</span>
                            <a href="" class="header__navbar-icon-link">
                                <i class="header__navbar-icon fa-brands fa-facebook"></i>
                            </a>
                            <a href="" class="header__navbar-icon-link">
                                <i class="header__navbar-icon fa-brands fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--has-notify ">
                            <a href="" class="header__navbar-item-link">
                                <i class="header__navbar-icon fa-solid fa-bell"></i>
                                Thông báo
                            </a>
                            <div class="notify">
                                <header class="notify-header">
                                    <h3>Thông báo mới nhận</h3>
                                </header>
                                <ul class="notify-list">
                                    
                                </ul>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <a href="../support/support.html" class="header__navbar-item-link">
                                <i class="header__navbar-icon fa-solid fa-circle-info"></i>
                                Trợ giúp
                            </a>
                        </li>
                       <!-- avatar / username -->
                       <?php
                        // kiểm tra đăng nhập chưa    
                        if (isset($_SESSION['username']) && ($_SESSION['username'] != "")) {
                            echo '<li class="header__navbar-item header__navbar-user">';

                            // Kiểm tra nếu có avatar trong session và không rỗng

                            if (isset($_SESSION['avatar']) && !empty($_SESSION['avatar'])) {
                                if (base64_encode(base64_decode($_SESSION['avatar'], true)) === $_SESSION['avatar']) {
                                    // Hiển thị ảnh đại diện từ dữ liệu base64 người dùng thêm từ ngoài
                                    echo '<img src="data:image/jpeg;base64,' . $_SESSION['avatar'] . '" alt="Profile Picture" class="header__navbar-user-img">';
                                } else {
                                    // Hiển thị ảnh đại diện từ đường dẫn khi chèn trong xampp
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['avatar']) . '" alt="Profile Picture"  class="header__navbar-user-img">';
                                }
                            } else {
                                // Hiển thị ảnh mặc định nếu không có avatar
                                echo '<img src="view/images/avatar_default.jpg" alt="Default Profile Picture" class="header__navbar-user-img">';
                            }

                            // Hiển thị menu bên dưới avatar,name
                            echo '<span class="header__navbar-user-name">' . $_SESSION['username'] . '</span>
                                    <ul class="header__navbar-user-menu">
                                        <li class="header__navbar-user-item">
                                            <a href="info-user.php">Tài khoản của tôi</a>
                                        </li>
                                        <li class="header__navbar-user-item">
                                            <a href="view/address/address.html">Địa chỉ của tôi</a>
                                        </li>
                                        <li class="header__navbar-user-item">
                                            <a href="view/order/ordered.html">Đơn mua</a>
                                        </li>
                                        <li class="header__navbar-user-item header__navbar-user-item-separates">
                                            <a href="index.php?act=logout">
                                                Đăng xuất
                                                <i class="fa-solid fa-right-from-bracket"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>';
                        } else {
                        ?>
                            <!-- Khi chưa đăng nhập  -->
                            <li class="header__navbar-item header__navbar-item--strong header__navbar-item--separate">
                                <a href="dangky.php" class="header__navbar-item-link">Đăng ký</a>
                            </li>
                            <li class="header__navbar-item header__navbar-item--strong">
                                <a href="dangnhap.php" class="header__navbar-item-link">Đăng nhập</a>
                            </li>

                        <?php
                        }
                        ?>

                    </ul>
                </nav>

                <!-- Header with search -->
                <div class="header-with-search">
                    <div class="header_logo">
                        <span class="header_logo-img"> <img src="../image/logo.png" alt="" style="width: 80px; height: auto; margin-left: 30px;">
                        </span>
                    </div>

                    <div class="header_search">
                        <div class="header_search-input-wrap">
                            <input type="text" class="header_search-input" placeholder="Tìm kiếm sản phẩm">

                            <!-- search history -->
                             <!-- Tính sau--------------------------- -->
                            <!-- <div class="header_search-history">
                                <h3 class="search-history-heading">
                                    Lịch sử tìm kiếm
                                </h3>
                                <ul class="search-history-list">
                                    <li class="search-history-list-item">
                                        <a href="">Kem dưỡng da</a>

                                    </li>
                                    <li class="search-history-list-item">
                                        <a href="">Kem trị mụn</a>

                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        <button class="header_search-btn">
                            <i class=" search-icon fa-solid fa-magnifying-glass"></i>
                        </button>

                    </div>
                    <!-- cart layout -->
                    <div class="header_cart">
                        <div class="header_cart-wrap">
                            <i class="header_cart-icon fa-solid fa-cart-shopping"></i>


                            <!-- No cart: header_cart-list--no-cart: class trường hợp không có sản phẩm thay vào no_cart  -->
                            <div class="header_cart-list no_cart">
                                <img src="../image/cart.png" alt="" class="header_cart--no-cart--img">
                                <span class="header_cart-no-cart-text">
                                    Chưa có sản phẩm
                                </span>

                                <h4 class="header_cart-heading">Sản phẩm đã thêm</h4>
                                <ul class="header_cart-list-item">
                                        <!-- Thêm sản phẩm vào giỏ hàng-->
                                </ul>

                                <a href="../cart/cart.html" class="header_cart-view-cart  button button--primary">Xem giỏ hàng</a>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </header>

