<?php

include "view/header1.php";
?>

<div class="main" style="min-height: 100vh;">
    <div class="auth-form" style="transform: translate(100%,30%);">

        <div class="auth-form_container">
            <form action="index.php?act=sigin" method="post">
                <div class="form-header">
                    <h3 class="form-heading">Đăng ký</h3>
                    <span class="form-switch-btn"><a href="dangnhap.php">Đăng nhập</a></span>
                </div>

                <div class="form__form">
                    <div class="form-group">
                        <input type="text" name="username" class="form-input" placeholder="Tên đăng nhập" id="regUsername">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-input" placeholder="Email của bạn" id="regEmail">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-input" placeholder="Mật khẩu của bạn" id="regPassword">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" class="form-input" placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
                <div class="form-aside">
                    <p class="policy-text">
                        Bằng việc đăng kí, bạn đã đồng ý với Fashion Store về
                        <a href="" class="text-link">Điều khoản dịch vụ</a> &
                        <a href="" class="text-link">Chính sách bảo mật</a>
                    </p>
                </div>
                <div class="form-controls">
                    <input type="submit" class="button button--primary"  value="ĐĂNG KÝ" name="sigin">
                </div>
            </form>
        </div>
        <br>

    </div>
</div>
