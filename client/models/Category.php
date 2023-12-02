<?php
require_once "config/connect.php";
class Category
{
    public static function getAllCategories()
    {
        global $cont;
        $sql = "SELECT * FROM category";
        $result = $cont->query($sql);
        $categories = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $category = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'description' => $row['description']
                ];
                $categories[] = $category;
            }
        }

        return $categories;
    }
    public static function addCategory($name, $description)
    {
        global $cont;

        // Chuẩn bị truy vấn SQL để chèn danh mục vào CSDL
        $sql = "INSERT INTO category (name, description) VALUES (?, ?)";
        $stmt = $cont->prepare($sql);
        $stmt->bind_param("ss", $name, $description);

        // Thực thi truy vấn
        if ($stmt->execute()) {
            // Thêm thành công
            return true;
        } else {
            // Lỗi khi thêm danh mục
            return false;
        }
    }

    public static function deleteById($id){
        global $cont;

        $sql = "DELETE FROM category where id = ".$id;

        if($cont->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getById($id){
        global $cont;

        $sql = "SELECT * FROM category where id=".$id;

        $result = $cont->query($sql);

        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            return $row;
        }
        return null;
    }

    public static function updateCategory($id,$name, $description){
        global $cont;

        $sql = "UPDATE category set name='$name',description='$description' where id = $id";


        // Thực thi truy vấn
        if ($cont->query($sql)) {
            // Thêm thành công
            return true;
        } else {
            // Lỗi khi thêm danh mục
            return false;
        }
    }
}
?>