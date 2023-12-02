<?php
require_once "../config/connect.php";
class Stores
{
    public static function getAllStores()
    {
        global $cont;
        $sql = "SELECT * FROM store";
        $result = $cont->query($sql);
        $stores = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $store = [
                    'id' => $row['id'],
                    'namestore' => $row['namestore'],
                    'address' => $row['address'],
                    'ulr' => $row['ulr'],
                    'phonestore' => $row['phonestore']
                ];
                $stores[] = $store;
            }
        }

        return $stores;
    }
    public static function addStore($namestore, $address,$ulr,$phonestore)
    {
        global $cont;
        // Chuẩn bị truy vấn SQL để chèn danh mục vào CSDL
        $sql = "INSERT INTO store (namestore, address,ulr,phonestore) VALUES (?, ?,?,?)";
        $stmt = $cont->prepare($sql);
        $stmt->bind_param("ssss", $namestore, $address,$ulr,$phonestore);
        $directory='../uploads/';
        $fn=$_FILES['image']['name'];
        $path=$directory.$fn;
        if(!file_exists($path)){
            move_uploaded_file($_FILES['image']['tmp_name'],$path);

        }
        
        // Thực thi truy vấn
        if ($stmt->execute()) {
            // Thêm thành công
            return true;
        } else {
            // Lỗi khi thêm danh mục
            return false;
        }
    }

    public static function deleteById($id)
    {
        global $cont;

        $sql = "DELETE FROM store where id = " . $id;

        if ($cont->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getById($id)
    {
        global $cont;

        $sql = "SELECT * FROM store where id=" . $id;

        $result = $cont->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
        return null;
    }

    public static function updateStore($id, $namestore, $address,$ulr,$phonestore)
    {
        global $cont;

        $sql = "UPDATE store set namestore='$namestore',address='$address',ulr='$ulr',phonestore='$phonestore' where id = $id";
        $directory='../uploads/';
        $fn=$_FILES['image']['name'];
        $path=$directory.$fn;
        if(!file_exists($path)){
            move_uploaded_file($_FILES['image']['tmp_name'],$path);

        }    

        // Thực thi truy vấn
        if ($cont->query($sql)) {
            // Thêm thành công
            return true;
        } else {
            // Lỗi khi thêm danh mục
            return false;
        }
    }
    public static function updateStore1($id, $namestore, $address,$phonestore)
    {
        global $cont;

        $sql = "UPDATE store set namestore='$namestore',address='$address',phonestore='$phonestore' where id = $id";
        // Thực thi truy vấn
        if ($cont->query($sql)) {
            // Thêm thành công
            return true;
        } else {
            // Lỗi khi thêm danh mục
            return false;
        }
    }

    public static function search($timkiem)
    {
        global $cont;

        // Truy vấn lấy dữ liệu từ bảng product
        $storeSql = "SELECT * FROM store where namestore like '%$timkiem%'";
        $storeResult = $cont->query($storeSql);


        $data = [];

        // Lấy dữ liệu từ bảng product
        if ($storeResult->num_rows > 0) {
            while ($storeRow = $storeResult->fetch_assoc()) {
                // Tạo mảng con cho mỗi sản phẩm
                $data[] = $storeRow;
            }
        }


        return $data;
    }
}
?>