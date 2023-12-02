<?php
require_once "../config/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin đăng nhập từ biểu mẫu
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Mã hóa mật khẩu bằng MD5
    $hashedPassword = md5($password);

    $sql = "SELECT * FROM admin where username='$username' and password = '$hashedPassword'";
    $result = $cont->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["idadmin"] = $row["id"];
        $_SESSION["username"] = $username;

        // Đăng nhập thành công, thực hiện các hành động tiếp theo (ví dụ: chuyển hướng đến trang chính)
        header("Location: home");
        exit();
    }
    else {
        // Đăng nhập không thành công, hiển thị thông báo lỗi
        $error = "Tên đăng nhập hoặc mật khẩu không chính xác";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style1.css">
    <style>
    .main-content {
        width: 50%;
        border-radius: 20px;
        box-shadow: 0 5px 5px rgba(0, 0, 0, .4);
        margin: 5em auto;
        display: flex;
    }

    .company__info {
        background-color: #008080;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;
    }

    .fa-android {
        font-size: 3em;
    }

    @media screen and (max-width: 640px) {
        .main-content {
            width: 90%;
        }

        .company__info {
            display: none;
        }

        .login_form {
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }
    }

    @media screen and (min-width: 642px) and (max-width:800px) {
        .main-content {
            width: 70%;
        }
    }

    .row>h2 {
        color: #008080;
    }

    .login_form {
        background-color: #fff;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        border-top: 1px solid #ccc;
        border-right: 1px solid #ccc;
    }

    form {
        padding: 0 2em;
    }

    .form__input {
        width: 100%;
        border: 0px solid transparent;
        border-radius: 0;
        border-bottom: 1px solid #aaa;
        padding: 1em .5em .5em;
        padding-left: 2em;
        outline: none;
        margin: 1.5em auto;
        transition: all .5s ease;
    }

    .form__input:focus {
        border-bottom-color: #008080;
        box-shadow: 0 0 5px rgba(0, 80, 80, .4);
        border-radius: 4px;
    }

    .submit-wrapper {
        padding-left: 75px;
    }


    .btn {
        transition: all .5s ease;
        width: 70%;
        border-radius: 30px;
        color: #008080;
        font-weight: 600;
        background-color: #fff;
        border: 1px solid #008080;
        margin-top: 1.5em;
        margin-bottom: 1em;

    }

    .btn:hover,
    .btn:focus {
        background-color: #008080;
        color: #fff;
    }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Yinka Enoch Adedokun">
        <title>Login Page</title>
    </head>

    <body>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="row main-content bg-success text-center">
                <div class="col-md-4 text-center company__info">
                    <span class="company__logo">
                        <h2><span class="fa fa-android"></span></h2>
                    </span>
                    <img src="../assets/images/logo-footer.png" alt="Logo">
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                    <div class="container-fluid">
                        <div class="row">
                            <h2>Log In</h2>
                        </div>
                        <div class="row">
                            <form method="post" action="" class="form-group">
                                <div class="row user-box">
                                    <input type="text" name="username" id="username" class="form__input"
                                        placeholder="Username">
                                </div>
                                <div class="row user-box">
                                    <!-- <span class="fa fa-lock"></span> -->
                                    <input type="password" name="password" id="password" class="form__input"
                                        placeholder="Password">
                                </div>

                                <div class="row submit-wrapper">
                                    <input type="submit" value="Submit" class="btn">
                                </div>
                            </form>
                            <?php if (isset($error)) { ?>
                            <p style="color:red;"><?php echo $error; ?></p>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->

    </body>
    <!-- partial -->

</body>

</html>