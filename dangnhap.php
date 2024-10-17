
<?php 
    include "view/header1.php";

?>
<div class="main" style="min-height: 80vh;">
    <div class="auth-form" style="transform: translate(100%,50%);">
        <div class="auth-form_container">
            <form action="index.php?act=login" method="post">
                <div class="form-header">
                    <h3 class="form-heading">Đăng nhập</h3>
                    <span class="form-switch-btn"><a href="dangky.php">Đăng ký</a></span>
                </div>

                <div class="form__form">
                    <div class="form-group">
                        <input type="text" class="form-input" name="username" placeholder="Username của bạn" required>
                    </div>

                    <div class="form-group password-container">
                        <input type="password" class="form-input" id="password" name="password" placeholder="Mật khẩu của bạn" required>
                        <i id="togglePassword" class="fas fa-eye-slash" style="cursor: pointer;"></i>
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-input" name="user_type" value="user"> <!-- Default là user, hoặc dùng dropdown để chọn -->
                    </div>
                </div>

                <div class="form-aside">
                    <div class="form_help">
                        <a href="" class="help-link help-forgot">Quên mật khẩu</a>
                        <span class="form_help-separate help-support"></span>
                        <a href="" class="help-link">Cần trợ giúp?</a>
                    </div>
                </div>

                <div class="form-controls">
                    <input type="submit" class="button button--primary" value="ĐĂNG NHẬP" name="login">
                </div>
            </form>
        </div>
        <br>
    </div>
</div>
<script>
      document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Thay đổi biểu tượng      
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
       
    });
</script>