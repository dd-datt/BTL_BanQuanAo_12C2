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
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="main.css">
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
                                    <li class="notify-item notify-item--viewed ">
                                        <a href="" class="notify-link">
                                            <span><img src="image/mypham.png" alt="" class="notify-img"></span>
                                            <div class="notify-info">
                                                <span class="notify-name">Mỹ phẩm Ohui chính hãng</span>
                                                <span class="notify-descriotion">Mô tả mỹ phẩm Ohui chính hãng Lorem
                                                    ipsum dolor sit amet consectetur, adipisicing elit. Ad dolore, harum
                                                    veritatis blanditiis at laborum, ut ducimus ullam ex numquam nisi
                                                   .</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notify-item notify-item--viewed">
                                        <a href="" class="notify-link">
                                            <span><img src="image/mypham.png" alt="" class="notify-img"></span>
                                            <div class="notify-info">
                                                <span class="notify-name">Mỹ phẩm Ohui chính hãng</span>
                                                <span class="notify-descriotion">Mô tả mỹ phẩm Ohui chính hãng Lorem
                                                    ipsum dolor sit amet consectetur, adipisicing elit. Esse quae, saepe
                                                 </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notify-item notify-item--viewed">
                                        <a href="" class="notify-link">
                                            <span><img src="image/mypham.png" alt="" class="notify-img"></span>
                                            <div class="notify-info">
                                                <span class="notify-name">Mỹ phẩm Ohui chính hãng</span>
                                                <span class="notify-descriotion">Mô tả mỹ phẩm Ohui chính hãng Lorem
                                                    ipsum dolor sit amet consectetur adipisicing elit. Dignissimos quod
                                                    nam quas maiores, officia dicta minima dolore repellendus minus
                                                    </span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <footer class="notify-footer">
                                    <a href="" class="notify-footer-btn">Xem tất cả</a>
                                </footer>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <a href="../support/support.html" class="header__navbar-item-link">
                                <i class="header__navbar-icon fa-solid fa-circle-info"></i>
                                Trợ giúp
                            </a>
                        </li>
                        <!-- <li class="header__navbar-item header__navbar-item--strong header__navbar-item--separate">
                            <a href="dangky.html" class="header__navbar-item-link">Đăng ký</a>
                        </li>
                        <li class="header__navbar-item header__navbar-item--strong">
                            <a href="dangnhap.html" class="header__navbar-item-link">Đăng nhập</a>
                        </li> -->
                        <li class="header__navbar-item header__navbar-user">
                            <img src="../image/anhnen212.jpg" alt="" class="header__navbar-user-img">
                            <span class="header__navbar-user-name">Garden</span>

                            <ul class="header__navbar-user-menu">
                                <li class="header__navbar-user-item">
                                    <a href="../info-user/info-user.html">Tài khoản của tôi</a>
                                </li>
                                <li class="header__navbar-user-item">
                                    <a href="../address/address.html">Địa chỉ của tôi</a>
                                </li>
                                <li class="header__navbar-user-item">
                                    <a href="../order/ordered.html">Đơn mua </a>
                                </li>
                                <li class="header__navbar-user-item header__navbar-user-item-separates">
                                    <a href="#">
                                        Đăng xuất
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
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
                            <div class="header_search-history">
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
                            </div>
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

                                    <!-- Cart item -->
                                    <li class="header_cart-item">
                                        <img src="../image/mypham.png" alt="" class="header__cart-img">
                                        <div class="header_cart-item-info">
                                            <div class="header_cart-item-head">
                                                <h5 class="header_cart-item-name">
                                                    Bộ kem đặc trị vùng mắt
                                                </h5>
                                                <div class="header_cart-item-price-wrap">
                                                    <span class="header_cart-item-price">2.000.000đ</span>
                                                    <span class="header_cart-item-multiply">x</span>
                                                    <span class="header_cart-item-qnt">2</span>
                                                </div>

                                            </div>
                                            <div class="header_cart-item-body">
                                                <span class="header_cart-item-description">
                                                    Phân loại: Mỹ phẩm
                                                </span>

                                            </div>
                                        </div>
                                    </li>
                                    <li class="header_cart-item">
                                        <img src="../image/mypham.png" alt="" class="header__cart-img">
                                        <div class="header_cart-item-info">
                                            <div class="header_cart-item-head">
                                                <h5 class="header_cart-item-name">
                                                    Bộ kem đặc trị vùng mắt
                                                </h5>
                                                <div class="header_cart-item-price-wrap">
                                                    <span class="header_cart-item-price">2.000.000đ</span>
                                                    <span class="header_cart-item-multiply">x</span>
                                                    <span class="header_cart-item-qnt">2</span>
                                                </div>

                                            </div>
                                            <div class="header_cart-item-body">
                                                <span class="header_cart-item-description">
                                                    Phân loại: Mỹ phẩm
                                                </span>

                                            </div>
                                        </div>
                                    </li>
                                    <li class="header_cart-item">
                                        <img src="../image/mypham.png" alt="" class="header__cart-img">
                                        <div class="header_cart-item-info">
                                            <div class="header_cart-item-head">
                                                <h5 class="header_cart-item-name">
                                                    Bộ kem đặc trị vùng mắt
                                                </h5>
                                                <div class="header_cart-item-price-wrap">
                                                    <span class="header_cart-item-price">2.000.000đ</span>
                                                    <span class="header_cart-item-multiply">x</span>
                                                    <span class="header_cart-item-qnt">2</span>
                                                </div>

                                            </div>
                                            <div class="header_cart-item-body">
                                                <span class="header_cart-item-description">
                                                    Phân loại: Mỹ phẩm
                                                </span>

                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <a href="../cart/cart.html" class="header_cart-view-cart  button button--primary">Xem giỏ hàng</a>
                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </header>

