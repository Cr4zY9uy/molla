<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?controller=home">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
        style="background-image: url('assets/images/banners/slideshow_3.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2"
                                role="tab" aria-controls="register-2" aria-selected="true">Đăng ký</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="register-2" role="tabpanel"
                            aria-labelledby="register-tab-2">
                            <form action="" method="post" onsubmit="return validateForm()">

                                <div class="form-group">
                                    <label for="register-password-2">Nhập tên *</label>
                                    <input type="text" class="form-control" id="register-password-2" name="name"
                                        required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password-2">Địa chỉ *</label>
                                    <input type="text" class="form-control" id="register-password-2" name="address"
                                        required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password-2">Số điện thoại *</label>
                                    <input type="text" class="form-control" id="register-password-2" name="phone"
                                        required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-email-2">Nhập email *</label>
                                    <input type="email" class="form-control" id="register-email-2" name="email"
                                        required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password-2">Nhập mật khẩu *</label>
                                    <input type="password" class="form-control" id="register-password-2" name="password"
                                        required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password-2">Xác nhận mật khẩu *</label>
                                    <input type="password" class="form-control" id="register-password-2"
                                        name="repassword" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <?php
                                    if (isset($message)) {
                                        echo '<p class="text-center" style="color:red;">' . $message . '</p>';
                                    }
                                    ?>

                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button name="btnregis" type="submit" class="btn btn-outline-primary-2">
                                        <span>Đăng ký</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="register-policy-2"
                                            required>
                                        <label class="custom-control-label" for="register-policy-2">Tôi đồng ý với <a
                                                href="#">điều khoản</a> *</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-footer -->
                            </form>
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->
<script>
function validateForm() {
    var passwordInput = document.querySelector('input[name="password"]');
    var password = passwordInput.value;

    if (password.length < 8) {
        alert("Mật khẩu phải có ít nhất 8 kí tự.");
        passwordInput.value = ''; // Xóa nội dung trường mật khẩu
        passwordInput.focus(); // Đặt trỏ chuột vào trường mật khẩu
        return false; // Ngăn chặn gửi biểu mẫu
    }

    return true; // Gửi biểu mẫu nếu mật khẩu hợp lệ
}
</script>