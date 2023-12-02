<?php
require_once "models/Stores.php";
class StoresController
{
    public function index()
    {
        $stores = Stores::getAllStores();
        include 'views/store.php';
    }
    public function addStore()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $namestore = $_POST['name'];
            $address = $_POST['address'];
            $ulr=$_FILES['image']['name'];
            $phonestore = $_POST['phonestore'];
            // Thực hiện xử lý và thêm danh mục vào CSDL
            if (Stores::addStore($namestore, $address,$ulr, $phonestore)) {
                // Thêm thành công
                echo '<script>

                    alert("Cửa hàng đã được thêm thành công");
                </script>';
                header("Location: stores");
            } else {
                // Lỗi khi thêm danh mục
                echo '<script>
                    alert("Đã xảy ra lỗi khi thêm cửa hàng");
                </script>';
            }
        } else {
            // Nếu không phải là yêu cầu POST, trả về lỗi
            echo '<script>
                    alert("Yêu cầu không hợp lệ!");
                </script>';
        }
    }
    public function updateStore()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $namestore = $_POST['editname'];
            $address = $_POST['editaddress'];
            $ulr=$_FILES['image']['name'];
            $phonestore = $_POST['editphonestore'];
            echo '<script>
                    alert("Đã xảy ra lỗi khi sửa cửa hàng");
                </script>';

            if($ulr==null){
                if (Stores::updateStore1($id, $namestore, $address, $phonestore)) {
                    // Thêm thành công
                    echo '<script>
                        alert("Cửa hàng đã được sửa thành công");
                    </script>';
                    header("Location: stores");
                } else {
                    // Lỗi khi thêm danh mục
                    echo '<script>
                        alert("Đã xảy ra lỗi khi sửa cửa hàng");
                    </script>';
                }
            }
            else{
            // Thực hiện xử lý và thêm danh mục vào CSDL
            if (Stores::updateStore($id, $namestore, $address,$ulr, $phonestore)) {
                // Thêm thành công
                echo '<script>
                    alert("Cửa hàng đã được sửa thành công");
                </script>';
                header("Location: stores");
            } else {
                // Lỗi khi thêm danh mục
                echo '<script>
                    alert("Đã xảy ra lỗi khi sửa cửa hàng");
                </script>';
            }
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
            if (Stores::deleteById($id)) {
                // Thêm thành công
                echo '<script>
                    alert("Cửa hàng đã được xóa thành công");
                </script>';
                header("Location: stores");
            } else {
                // Lỗi khi thêm danh mục
                echo '<script>
                    alert("Đã xảy ra lỗi khi xóa cửa hàng");
                </script>';
                header("Location: stores");
            }
        } else {
            // Nếu không phải là yêu cầu POST, trả về lỗi
            echo '<script>
                    alert("Yêu cầu không hợp lệ!");
                </script>';
            header("Location: stores");
        }
        include "views/404.php";
    }
    public function search()
    {
        $timkiem = $_POST["timkiem"];
        $storessearch = Stores::search($timkiem);
        include("views/searchstores.php");
    }
    
}

?>