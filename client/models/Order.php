<?php
    require_once "config/connect.php";
    require_once "client/models/Images.php";
    class Order{
        public static function selectOrderDetailIdByCustomerId($customerId){
            global $cont;

            $sql = "SELECT DISTINCT orderid FROM `orderdetail` where customerid= $customerId";

            $data = [];

            $result = mysqli_query($cont,$sql);

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $data[]=$row;
                }
            }
            return $data;
        }

        public static function selectOrderDetailById($orderDetailId){
            global $cont;

            $sql = "SELECT * FROM orders where id = $orderDetailId";

            $result = mysqli_query($cont,$sql);

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    return $row;
                }
            }
            return null;
        }
        public static function selectOrderByOrderDetailId($orderDetailId){
            global $cont;

            $sql = "SELECT * FROM orderdetail where orderid=$orderDetailId";

            $result = mysqli_query($cont,$sql);

            $data = [];

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $data[]=$row;
                }
            }
            return $data;
        }

        public static function getProductIdByOrderDetailId($OrderDetailId){
            global $cont;

            $sql = "SELECT productid from orderdetail where orderid=$OrderDetailId";
            $result = mysqli_query($cont,$sql);

            $data = [];

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $data[]=$row;
                }
            }
            return $data;

        }

        public static function getQuantityByOrderAndProduct($orderdetailid,$productId){
            global $cont;

            $sql = "SELECT quantity from orderdetail where orderid=$orderdetailid and productid = $productId";
            $result = mysqli_query($cont,$sql);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    return $row;
                }
            }

        }
    
    }

?>