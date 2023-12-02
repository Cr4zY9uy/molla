<?php
    require_once("client/models/cart.php");
    require_once("client/models/Customer.php");
    require_once "client/models/Brands.php";
    require_once "client/models/Category.php";
    require_once("client/models/Order.php");
    require_once "client/models/product.php";
    class CartController{
        public function index()
        {
            if (!isset($_SESSION["customerid"])) {
                if (isset($_POST["id"])) {
                    if (isset($_POST["quantity"])) {
                        $quantity = $_POST["quantity"];
                    } else {
                        $quantity = 1;
                    }
                    // Kiểm tra xem giỏ hàng đã được khởi tạo hay chưa
                    if (!isset($_SESSION["cart"])) {
                        $_SESSION["cart"] = array();
                    }
    
                    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
                    if (isset($_SESSION["cart"][$_POST["id"]])) {
                        // Nếu sản phẩm đã tồn tại, cộng dồn số lượng mới vào số lượng hiện có
                        if (isset($_POST["update"])) {
                            $_SESSION["cart"][$_POST["id"]] = $quantity;
                        } else {
                            $_SESSION["cart"][$_POST["id"]] += $quantity;
                        }
                    } else {
                        // Nếu sản phẩm chưa tồn tại, thêm sản phẩm vào giỏ hàng với số lượng mới
                        $_SESSION["cart"][$_POST["id"]] = $quantity;
                    }
                    header("Location: ?controller=cart");
                    exit(); // Kết thúc script
                }
                if (isset($_GET["deleteid"])) {
                    if (isset($_SESSION["cart"])) {
                        if (isset($_SESSION["cart"][$_GET["deleteid"]])) {
                            // Nếu sản phẩm đã tồn tại, cộng dồn số lượng mới vào số lượng hiện có
                            unset($_SESSION["cart"][$_GET["deleteid"]]);
                            header("Location: ?controller=cart");
                            exit(); // Kết thúc script
                        }
                    }
                }
            } else {
                if (isset($_POST["id"])) {
                    if (!isset($_POST["update"])) {
                        if (isset($_POST["quantity"])) {
                            $quantity = $_POST["quantity"];
                        } else {
                            $quantity = 1;
                        }
                        if (Cart::addCart($_SESSION["customerid"], $_POST["id"], $quantity)) {
                            header("Location: ?controller=cart");
                            exit(); // Kết thúc script
                        } else {
                            header("Location: ?controller=cart");
                            exit(); // Kết thúc script
                        }
                    } else {
                        $quantity = $_POST["quantity"];
                        if (Cart::updateCart($_SESSION["customerid"], $_POST["id"], $quantity)) {
                            header("Location: ?controller=cart");
                            exit(); // Kết thúc script
                        } else {
                            header("Location: ?controller=cart");
                            exit(); // Kết thúc script
                        }
                    }
                }
    
                if (isset($_POST["add"])) {
                    if (isset($_POST["id"])) {
                        if (isset($_POST["quantity"]) && $_POST["quantity"] == 1) {
                            $quantity = $_POST["quantity"];
                            if (Cart::addCart($_SESSION["customerid"], $_POST["id"], $quantity)) {
                                header("Location: ?controller=cart");
                                exit(); // Kết thúc script
                            } else {
                                header("Location: ?controller=cart");
                                exit(); // Kết thúc script
                            }
                        } else {
                            $quantity = $_POST["quantity"];
                            if (Cart::addUpdateCart($_SESSION["customerid"], $_POST["id"], $quantity)) {
                                header("Location: ?controller=cart");
                                exit(); // Kết thúc script
                            } else {
                                header("Location: ?controller=cart");
                                exit(); // Kết thúc script
                            }
                        }
                    }
                }
    
                if (isset($_GET["deleteid"])) {
                    $deleteid = $_GET["deleteid"];
                    if (Cart::deleteById($deleteid)) {
                        $message = Cart::deleteById($deleteid);
                    }
                    $message = Cart::deleteById($deleteid);
                }
                $cart = Cart::getByCustomerId($_SESSION["customerid"]);
    
            }
            include 'client/views/cart.php';
        }
        public function checkout(){
            if (isset($_SESSION["customerid"])) {

                if (Cart::getByCustomerId($_SESSION["customerid"])!=null) {
                    $carts = Cart::getByCustomerId($_SESSION["customerid"]);
                    $customer = Customer::getCustomerById($_SESSION["customerid"]);
                } else {
                    $carts = Cart::getByCustomerId($_SESSION["customerid"]);
                    $message = "Không có sản phẩm trong giỏ hàng!";
                }
                include 'client/views/checkout.php';

            } else {
                header("Location: ?controller=home&action=login");
            }
        }
        public function add(){  
            include 'client/views/cart.php';
        }

        public function order()
    {
        if (isset($_SESSION["customerid"]) && isset($_POST["order"])) {
            $id = $_SESSION["customerid"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $note = $_POST["note"];
            $payment = $_POST["payment"];
            $total = $_POST["total"];
            $price = $_POST["price"];

            if (cart::orderCart($id, $name, $phone, $email, $address, $note, $payment,$total,$price)) {
                header("Location: ?controller=home");
                exit(); // Kết thúc script
            }
            header("Location: ?controller=home");
            exit(); // Kết thúc script
        } else {
            header("Location: ?controller=home&action=login");
        }
    }

    public function orderDetail()
    {
        if (isset($_SESSION["customerid"])) {
            $orders = Order::selectOrderDetailIdByCustomerId($_SESSION["customerid"]);
            include 'client/views/orderdetail.php';
        } else {
            header("Location: ?controller=home&action=login");
        }
    }

    public function updatestatus()
    {
        if (isset($_GET["id"])) {
            Cart::changeStatus($_GET["id"]);
            header("Location: ?controller=cart&action=orderdetail");
        }
    }
    }
?>