<?php
require_once "models/customers.php";
    class CustomersController{
        public function index(){
            if(isset($_POST["disable"])){
                $id = $_POST["id"];
                if(Customers::disableById($id)){
                    $messageDelete = "Vô hiệu hóa thành công!";
                }
                else{
                    $messageDelete = "Vô hiệu hóa thất bại!";
                }
            }
            if(isset($_POST["enable"])){
                $id = $_POST["id"];
                if(Customers::enableById($id)){
                    $messageDelete = "Kích hoạt thành công!";
                }
                else{
                    $messageDelete = "Kích hoạt thất bại!";
                }
            }

            $customers = Customers::getAllCustomers(null);
            include 'views/customers.php';
        }

        public function search()
        {
            $timkiem = $_POST["timkiem"];
            $customerssearch = Customers::search($timkiem);
            include("views/searchcustomers.php");
        }
        
    }
?>