<?php
require_once "client/models/Category.php";
require_once "client/models/Brands.php";
require_once "client/models/Customer.php";
require_once "client/models/product.php";
require_once "client/models/Stores.php";
class HomeController
{
    public function index()
    {
        $brands = Brands::getAllBrands();
        $categories = Category::getAllCategories();
        $listproductsnew = Product::getproductsnew();
        $listproductssale = Product::getproductsprice();
        $listproductslimited = Product::getproductslimidted();
        $stores = Stores::getnewStores();
        include 'client/views/home.php';
    }

    public function login()
    {
        if (!isset($_SESSION['customerid'])) {
            if (isset($_POST["btnlogin"])) {
                $email = $_POST["email"];
                $password = md5($_POST["password"]);
                if (Customer::checkLogin($email, $password) != -1) {
                    if(Customer::checkstatus($email,$password ) == 0 ){
                        $_SESSION["customerid"] = Customer::checkLogin($email,$password);
                    header("location:?home");
                    exit();
                    }else{
                    $message = "Tài khoản của bạn đã bị vô hiệu hóa!";

                    }
                } else {
                    $message = "Email hoặc mật khẩu không đúng!";
                }
            }
        } 
        if(isset($_SESSION['customerid'])){
            header("Location: ?controller=home");
            exit(); // Kết thúc script
        }
        include 'client/views/login.php';

    }

    public function logout()
    {
        unset($_SESSION["customerid"]);
        header("Location: ?controller=home");
        exit(); // Kết thúc script
    }

    public function register()
    {
        if (isset($_POST["btnregis"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];
            $address = $_POST["address"];

            if ($password != $repassword) {
                $message = "Mật khẩu không khớp!";
            } else {
                $password = md5($password);
                $result = Customer::addCustommer($name, $email, $phone, $password, $address);
                if ($result == -1) {
                    $message = "Email hoặc số điện thoại đã tồn tại!";
                }
                if ($result == 0) {
                    $message = "Có lỗi xảy ra!";
                }
                if ($result == 1) {
                    header("Location: ?controller=home&action=login");
                    exit();
                }
            }
        }
        include 'client/views/register.php';
    }

    public function search()
    {
        if (isset($_POST["q"])) {
            $q = $_POST["q"];
            $products = Product::search($q);
            include 'client/views/searchproduct.php';
        } else {

            header("Location: ?controller=home");
        }
    }

    public function forgotpass()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy email từ form
            $email = $_POST["email"];

            $customer = Customer::getCustomerByEmail($email);
            if ($customer!=null) {
                $recoverycode = Customer::generateRandomString(50);


                require("PHPMailer/src/PHPMailer.php");
                require("PHPMailer/src/SMTP.php");

                $mail = new PHPMailer\PHPMailer\PHPMailer();
                $mail->IsSMTP(); // enable SMTP

                //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465; // or 587
                $mail->IsHTML(true);
                $mail->Username = "heronakamura123@gmail.com";
                $mail->Password = "pcedahtrdtdvkork";
                $mail->SetFrom("heronakamura123@gmail.com");
                $mail->Subject = "Molla Toy Store";
                $mail->Body = "Để khôi phục mật khẩu, vui lòng truy cập: http://localhost/abc/?controller=home&action=resetpass&recoverycode=".$recoverycode."  Link có hiệu lực trong 5 phút!";
                $mail->AddAddress($email);

                if (!$mail->Send()) {
                    $message = "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    if(Customer::addRecoveryCode($customer["id"],$recoverycode)){
                        $message = "Vui lòng kiểm tra email và kích vào link để lấy lại mật khẩu!";
                    }
                }
            } else {
                $message = "Email không tồn tại!";
            }
        }
        include 'client/views/forgotpass.php';
    }

    public function resetpass(){
        if(isset($_GET["recoverycode"])){
            if(Customer::checkRecoveryCode($_GET["recoverycode"])){
                $recoverycode = $_GET["recoverycode"];
                include 'client/views/resetpass.php';
            }
            else{
                header("Location: ?controller=home");
            }
        }
        else if(isset($_POST["btnreset"])){
            $recoverycode = $_POST["recoverycode"];
            $pass = $_POST["password"];
            $repass = $_POST["repassword"];
            $message = "Mật khẩu không giống nhau!ddd";
            if($pass != $repass){
                $message = "Mật khẩu không giống nhau!";
            }
            else{
                $pass = md5($pass);
                if(Customer::resetPass($recoverycode,$pass)){
                    header("Location: ?controller=home&action=login");
                }
                else{
                    $message = "Lỗi!";
                }
            }
            $message = "Mật khẩu không giống nhau!";

            include 'client/views/resetpass.php';

        }
        else{
            header("Location: ?controller=home");
        }
    }


}
?>