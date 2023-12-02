<?php
require_once "../config/connect.php";
class Customers
{
    public static function getAllCustomers($name)
    {
        global $cont;
        $sql = "SELECT * FROM customer ";
        if($name){
            $sql .=" name like '%$name%'";
        }
        $result = mysqli_query($cont,$sql);
        $data = [];
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
        }
        return $data;
    }

    public static function disableById($id){
        global $cont;
        $sql = "UPDATE customer SET status = 1 where id=$id";
        if(mysqli_query($cont,$sql)){
            return true;
        }
        return false;
    }
    public static function enableById($id){
        global $cont;
        $sql = "UPDATE customer SET status = 0 where id=$id";
        if(mysqli_query($cont,$sql)){
            return true;
        }
        return false;
    }
    public static function update($id,$name,$email,$phone,$address){
        global $cont;
        $sql = "UPDATE customer set name='$name',email='$email',phone='$phone',address='$address' where id = $id";
        if(mysqli_query($cont,$sql)){
            return true;
        }
        return $sql;
    }
    public static function search($timkiem)
    {
        global $cont;

        // Truy vấn lấy dữ liệu từ bảng product
        $customerSql = "SELECT * FROM customer where name like '%$timkiem%'";
        $customerResult = $cont->query($customerSql);


        $data = [];

        // Lấy dữ liệu từ bảng product
        if ($customerResult->num_rows > 0) {
            while ($customerRow = $customerResult->fetch_assoc()) {
                // Tạo mảng con cho mỗi sản phẩm
                $data[]= $customerRow;
            }
        }


        return $data;
    }
    
}
?>