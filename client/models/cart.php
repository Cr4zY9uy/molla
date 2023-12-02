<?php
require_once "config/connect.php";
class Cart
{
    public static function addCart($customerid, $productid, $quantity)
    {
        global $cont;

        $sqlselect = "SELECT * FROM cart where customerid=$customerid and productid=$productid";
        $result = mysqli_query($cont, $sqlselect);

        if (mysqli_num_rows($result) <= 0) {
            $sql = "INSERT INTO cart(customerid,productid,quantity) value ($customerid,$productid,$quantity)";

            if (mysqli_query($cont, $sql)) {
                return true;
            }
            return false;
        }
        else{
            $row = mysqli_fetch_assoc($result);
            $quantity = $quantity+$row["quantity"];
            $sqlupdate = "Update cart set quantity = ".$quantity." where customerid=$customerid and productid=$productid";
            if (mysqli_query($cont, $sqlupdate)) {
                return true;
            }
            return false;
        }
    }
    public static function updateCart($customerid, $productid, $quantity)
    {
        global $cont;

        $sqlselect = "SELECT * FROM cart where customerid=$customerid and productid=$productid";
        $result = mysqli_query($cont, $sqlselect);

        if (mysqli_num_rows($result) <= 0) {
            $sql = "INSERT INTO cart(customerid,productid,quantity) value ($customerid,$productid,$quantity)";

            if (mysqli_query($cont, $sql)) {
                return true;
            }
            return false;
        }
        else{
            $row = mysqli_fetch_assoc($result);
            $sqlupdate = "Update cart set quantity = ".$quantity." where customerid=$customerid and productid=$productid";
            if (mysqli_query($cont, $sqlupdate)) {
                return true;
            }
            return false;
        }
    }
    public static function addUpdateCart($customerid, $productid, $quantity)
    {
        global $cont;

        $sqlselect = "SELECT * FROM cart where customerid=$customerid and productid=$productid";
        $result = mysqli_query($cont, $sqlselect);

        if (mysqli_num_rows($result) <= 0) {
            $sql = "INSERT INTO cart(customerid,productid,quantity) value ($customerid,$productid,$quantity)";

            if (mysqli_query($cont, $sql)) {
                return true;
            }
            return false;
        }
        else{
            $row = mysqli_fetch_assoc($result);
            $sqlupdate = "Update cart set quantity += ".$quantity." where customerid=$customerid and productid=$productid";
            if (mysqli_query($cont, $sqlupdate)) {
                return true;
            }
            return false;
        }
    }

    public static function getByCustomerId($id){
        global $cont;
        $sqlselect = "SELECT * FROM cart where customerid=$id";

        $result = mysqli_query($cont,$sqlselect);
        $data = [];

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
        }
        return $data;

    }
    public static function countCartByCustomerId($id){
        global $cont;

        $sqlselect = "SELECT COUNT(*) as num FROM cart where customerid=$id";
        $result = mysqli_query($cont,$sqlselect);
        $row = mysqli_fetch_assoc($result);

        return $row["num"];
    }

    public static function deleteById($id){
        global $cont;

        $sqldelete = "DELETE FROM cart where productid=$id";

        if(mysqli_query($cont,$sqldelete)){
            return true;
        }

        return $sqldelete;
    }

    public static function orderCart($customerId,$name,$phone,$email,$address,$note,$payment,$total,$price){
        global $cont;

        $sql = "INSERT into orders(name,phone,email,address,note,total,payment) values ('$name','$phone','$email','$address','$note','$total','$payment')";

        if(mysqli_query($cont,$sql)){
            $idOrder = mysqli_insert_id($cont);
            $carts = Cart::getByCustomerId($customerId);
            foreach($carts as $cart){
                $productId=$cart["productid"];
                $quantity = $cart["quantity"];
                $sqlInsert = "INSERT into orderdetail(orderid,customerid,productid,quantity,price) values ($idOrder,$customerId,$productId,$quantity,$price)";
                if(mysqli_query($cont,$sqlInsert)){
                }
            }
            mysqli_query($cont,"DELETE FROM cart where customerid = $customerId");
            return true;
        }
        else{
            return false;
        }
    }

    public static function changeStatus($orderdetailid){
        global $cont;
        $sql = "UPDATE orders set status = status+1 where id = $orderdetailid";
        if(mysqli_query($cont,$sql)){
            return true;
        }
        return false;
    }
}
?>