<?php
require_once "models/Products.php";
require_once "models/Category.php";
require_once "models/Brands.php";
require_once "models/Configuration.php";
require_once "models/Images.php";
require_once "models/Orders.php";
class OrdersController
{
    public function index()
    {
        if (isset($_POST["xacnhan"]) || isset($_POST["chuanbi"]) || isset($_POST["guihang"])) {
            if (isset($_POST["id"])) {
                $orderInfor = Orders::selectOrderDetailById($_POST["id"]);
                $email = $orderInfor["email"];
                if (Orders::getStatus($_POST["id"]) == 0) {
                    require("../PHPMailer/src/PHPMailer.php");
                    require("../PHPMailer/src/SMTP.php");
                    $mail = new \PHPMailer\PHPMailer\PHPMailer();
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
                    $mail->Body = "Đơn hàng có mã ".$_POST["id"]." của bạn đã được xác nhận!";
                    $mail->AddAddress($email);
                    if (!$mail->Send()) {
                        $message = "Mailer Error: " . $mail->ErrorInfo;
                    }
                    $message = "1";
                }
                Orders::changeStatus($_POST["id"]);
            }
        }
        $orders = Orders::getAllOrderDetailId();
        include 'views/orders.php';

    }
    public function search()
    {
        $timkiem = $_POST["timkiem"];
        $orderssearch = Orders::search($timkiem);
        include("views/searchorders.php");
    }
    public function searchStatus()
    {
        $timkiem = $_GET["status"];
        $orderssearch1 = Orders::searchStatus($timkiem);
        include("views/searchorderstatus.php");
    }
}
?>