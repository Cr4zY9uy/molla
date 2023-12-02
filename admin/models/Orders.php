<?php
    require_once "../config/connect.php";

    class Orders{
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
        public static function getStatus($id){
            global $cont;
            $sql = "SELECT * FROM orders where id=$id";
            $row = mysqli_fetch_assoc(mysqli_query($cont,$sql));
            return $row["status"];
        }
        public static function getAllOrderDetailId(){
            global $cont;

            $sql = "SELECT DISTINCT orderid FROM `orderdetail`";

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

        public static function changeStatus($orderid){
            global $cont;
            $sql = "UPDATE orders set status = status+1 where id = $orderid";
            if(mysqli_query($cont,$sql)){
                return true;
            }
            return false;
        }
        public static function search($timkiem)
{
    global $cont;

    // Truy vấn lấy dữ liệu từ bảng orders
    $orderSql = "SELECT * FROM orderdetail WHERE orderid LIKE '%$timkiem%'";
    $orderResult = $cont->query($orderSql);

    $data = [];
    $check = null;

    // Lấy dữ liệu từ bảng orders
    if ($orderResult->num_rows > 0) {
        while ($orderRow = $orderResult->fetch_assoc()) {
            // Lấy orderdetailid hiện tại
            $orderdetailid = $orderRow['orderid'];

            // Kiểm tra nếu orderdetailid thay đổi so với dòng trước đó
            if ($orderdetailid !== $check) {
                // Gán giá trị mới cho biến $check
                $check = $orderdetailid;

                // Thêm dữ liệu vào mảng $data
                $data[] = $orderRow;
            }
        }
    }

    return $data;
}

        public static function searchStatus($status)
{
    global $cont;

    // Truy vấn lấy dữ liệu từ bảng orders và orderdetail
    $orderSql = "SELECT *
                 FROM orderdetail
                 JOIN orders ON orderdetail.orderid = orders.id   
                 WHERE orders.status LIKE '$status'";
    $orderResult = $cont->query($orderSql);

    $data = [];
    $check = null;

    // Lấy dữ liệu từ bảng orders và orderdetail
    if ($orderResult->num_rows > 0) {
        while ($orderRow = $orderResult->fetch_assoc()) {
            // Lấy orderdetailid hiện tại
            $orderdetailid = $orderRow['orderid'];

            // Kiểm tra nếu orderdetailid thay đổi so với dòng trước đó
            if ($orderdetailid !== $check) {
                // Gán giá trị mới cho biến $check
                $check = $orderdetailid;

                // Thêm dữ liệu vào mảng $data
                $data[] = $orderRow;
            }
        }
    }

    return $data;
}
    }
?>