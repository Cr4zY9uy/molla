<?php
require_once "models/Brands.php";
class BrandsController
{
    public function index()
    {
        $brands = Brands::getAllBrands();
        include 'views/brands.php';
    }
    public function addBrand()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $imageurl = $_FILES['image']['name'];
            $path = "../assets/images/brands/";
            $duongdan = $path.basename($imageurl);
            // Thực hiện xử lý và thêm danh mục vào CSDL
            if($duongdan != null){
                move_uploaded_file($_FILES["image"]["tmp_name"],$duongdan);
            }
            if (Brands::addBrand($name, $description,$imageurl)) {
                // Thêm thành công
                echo '<script>

                    alert("Nhãn hiệu đã được thêm thành công");
                </script>';
                header("Location: brands");
            } else {
                // Lỗi khi thêm danh mục
                echo '<script>
                    alert("Đã xảy ra lỗi khi thêm nhãn hiệu");
                </script>';
            }
        } else {
            // Nếu không phải là yêu cầu POST, trả về lỗi
            echo '<script>
                    alert("Yêu cầu không hợp lệ!");
                </script>';
        }
    }
    public function updateBrand()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['editName'];
            $description = $_POST['editDescription'];
            $imageurl = $_FILES['image']['name'];
            $path = "../assets/images/brands/";
            $duongdan = $path.basename($imageurl);
            // Thực hiện xử lý và thêm danh mục vào CSDL
            echo $imageurl;
            if($imageurl != null){
                move_uploaded_file($_FILES["image"]["tmp_name"],$duongdan);
            }
            echo '<script>
                    alert("Đã xảy ra lỗi khi sửa danh mục");
                </script>';

            // Thực hiện xử lý và thêm danh mục vào CSDL
            if (Brands::updateBrand($id, $name, $description,$imageurl)) {
                // Thêm thành công
                echo '<script>
                    alert("Danh mục đã được sửa thành công");
                </script>';
                header("Location: brands");
            } else {
                // Lỗi khi thêm danh mục
                echo '<script>
                    alert("Đã xảy ra lỗi khi sửa nhãn hiệu");
                </script>';
            }
        } else {
            // Nếu không phải là yêu cầu POST, trả về lỗi
            echo '<script>
                    alert("Yêu cầu không hợp lệ!");
                </script>';
        }
    }
    public function deleteById()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            echo '<script>
            alert("' . $id . '");
        </script>';
            // Thực hiện xử lý và thêm danh mục vào CSDL
            if (Brands::deleteById($id)) {
                // Thêm thành công
                echo '<script>
                    alert("Nhãn hiệu đã được xóa thành công");
                </script>';
                header("Location: brands");
            } else {
                // Lỗi khi thêm danh mục
                echo '<script>
                    alert("Đã xảy ra lỗi khi xóa nhãn hiệu");
                </script>';
                header("Location: brands");
            }
        } else {
            // Nếu không phải là yêu cầu POST, trả về lỗi
            echo '<script>
                    alert("Yêu cầu không hợp lệ!");
                </script>';
            header("Location: categories");
        }
        include "views/404.php";
    }

    public function search()
    {
        $timkiem = $_POST["timkiem"];
        $brandssearch = Brands::search($timkiem);
        include("views/searchbrands.php");
    }
}

?>