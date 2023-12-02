<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?controller=home">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
        style="background-image: url('uploads/bannerlogin.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                                aria-controls="signin-2" aria-selected="false">Đăng nhập</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="signin-2" role="tabpanel"
                            aria-labelledby="signin-tab-2">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="singin-email-2">Nhập Email *</label>
                                    <input type="text" class="form-control" id="singin-email-2" name="email" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="singin-password-2">Nhập mật khẩu *</label>
                                    <input type="password" class="form-control" id="singin-password-2" name="password"
                                        required>
                                </div><!-- End .form-group -->
                                <div class="form-group">
                                    <?php
												if(isset($message)){
												echo($message);

												}
											?>
                                </div><!-- End .form-group -->
                                <div class="form-footer">
                                    <button name="btnlogin" type="submit" class="btn btn-outline-primary-2">
                                        <span>Đăng nhập</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                        <label class="custom-control-label" for="signin-remember-2">Nhớ mật khẩu</label>
                                    </div><!-- End .custom-checkbox -->

                                    <a href="?controller=home&action=forgotpass" class="forgot-link">Quên mật khẩu?</a>
                                </div><!-- End .form-footer -->
                            </form>
                            <a href="?controller=home&action=register" style="float: right;">
                                Đăng ký
                            </a>
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
</main><!-- End .main -->