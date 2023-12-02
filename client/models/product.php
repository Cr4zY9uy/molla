<?php
require_once("config/connect.php");
require_once 'client/models/Images.php';
class product
{
    public static function getallproducts()
    {
        global $cont;
        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product ORDER by created_at DESC";
        $productResult = mysqli_query($cont, $productSql);

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image ORDER by id DESC";
        $imageResult = mysqli_query($cont, $imageSql);

        $data = [];

        // Lấy dữ liệu từ bảng product
        if (mysqli_num_rows($productResult) > 0) {
            while ($productRow = mysqli_fetch_assoc($productResult)) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data[$productId] = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if (mysqli_num_rows($imageResult) > 0) {
            while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                $productId = $imageRow['productid'];

                // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                if (isset($data[$productId])) {
                    // Thêm URL của ảnh vào mảng images của sản phẩm
                    $data[$productId]['images'][] = $imageRow['url'];
                }
            }
        }

        return $data;
    }
    public static function getallproductsByPriceDown(){
        global $cont ;
            // Truy vấn lấy dữ liệu từ bảng product
            $productSql = "SELECT * FROM product ORDER by price DESC";
            $productResult = mysqli_query($cont,$productSql);
    
            // Truy vấn lấy dữ liệu từ bảng image
            $imageSql = "SELECT * FROM image ORDER by id DESC";
            $imageResult = mysqli_query($cont,$imageSql);
    
            $data = [];
    
            // Lấy dữ liệu từ bảng product
            if (mysqli_num_rows($productResult) > 0) {
                while ($productRow = mysqli_fetch_assoc($productResult)) {
                    $productId = $productRow['id'];
    
                    // Tạo mảng con cho mỗi sản phẩm
                    $data[$productId] = [
                        'product' => $productRow,
                        'images' => []
                    ];
                }
            }
    
            // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
            if (mysqli_num_rows($imageResult) > 0) {
                while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                    $productId = $imageRow['productid'];
    
                    // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                    if (isset($data[$productId])) {
                        // Thêm URL của ảnh vào mảng images của sản phẩm
                        $data[$productId]['images'][] = $imageRow['url'];
                    }
                }
            }
    
            return $data;
    }

    public static function getallproductsByPriceUp(){
        global $cont ;
            // Truy vấn lấy dữ liệu từ bảng product
            $productSql = "SELECT * FROM product ORDER by price";
            $productResult = mysqli_query($cont,$productSql);
    
            // Truy vấn lấy dữ liệu từ bảng image
            $imageSql = "SELECT * FROM image ORDER by id DESC";
            $imageResult = mysqli_query($cont,$imageSql);
    
            $data = [];
    
            // Lấy dữ liệu từ bảng product
            if (mysqli_num_rows($productResult) > 0) {
                while ($productRow = mysqli_fetch_assoc($productResult)) {
                    $productId = $productRow['id'];
    
                    // Tạo mảng con cho mỗi sản phẩm
                    $data[$productId] = [
                        'product' => $productRow,
                        'images' => []
                    ];
                }
            }
    
            // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
            if (mysqli_num_rows($imageResult) > 0) {
                while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                    $productId = $imageRow['productid'];
    
                    // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                    if (isset($data[$productId])) {
                        // Thêm URL của ảnh vào mảng images của sản phẩm
                        $data[$productId]['images'][] = $imageRow['url'];
                    }
                }
            }
    
            return $data;
    }
    public static function getallproductsByIdUp($cateid){
        global $cont ;
        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product WHERE categoryid = '$cateid' ORDER by id DESC ";
        $productResult = mysqli_query($cont,$productSql);

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image ORDER by id DESC";
        $imageResult = mysqli_query($cont,$imageSql);

        $data = [];

        // Lấy dữ liệu từ bảng product
        if (mysqli_num_rows($productResult) > 0) {
            while ($productRow = mysqli_fetch_assoc($productResult)) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data[$productId] = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if (mysqli_num_rows($imageResult) > 0) {
            while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                $productId = $imageRow['productid'];

                // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                if (isset($data[$productId])) {
                    // Thêm URL của ảnh vào mảng images của sản phẩm
                    $data[$productId]['images'][] = $imageRow['url'];
                }
            }
        }

        return $data;
    }

    public static function getallproductsByIdDown($cateid){
        global $cont ;
        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product WHERE categoryid = '$cateid' ORDER by id ";
        $productResult = mysqli_query($cont,$productSql);

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image ORDER by id DESC";
        $imageResult = mysqli_query($cont,$imageSql);

        $data = [];

        // Lấy dữ liệu từ bảng product
        if (mysqli_num_rows($productResult) > 0) {
            while ($productRow = mysqli_fetch_assoc($productResult)) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data[$productId] = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if (mysqli_num_rows($imageResult) > 0) {
            while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                $productId = $imageRow['productid'];

                // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                if (isset($data[$productId])) {
                    // Thêm URL của ảnh vào mảng images của sản phẩm
                    $data[$productId]['images'][] = $imageRow['url'];
                }
            }
        }

        return $data;
    }
    public static function getAllPaginatedProducts($page, $limit)
    {
        global $cont;

        $start = ($page - 1) * $limit;

        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product";

        $productSql .= " ORDER by created_at DESC LIMIT $start, $limit";

        $productResult = $cont->query($productSql);
        $data = [];

        if ($productResult->num_rows > 0) {
            while ($productRow = $productResult->fetch_assoc()) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data[$productId] = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image";
        $imageResult = $cont->query($imageSql);

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if ($imageResult->num_rows > 0) {
            while ($imageRow = $imageResult->fetch_assoc()) {
                $productId = $imageRow['productid'];

                // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                if (isset($data[$productId])) {
                    // Thêm URL của ảnh vào mảng images của sản phẩm
                    $data[$productId]['images'][] = $imageRow['url'];
                }
            }
        }

        return $data;
    }
    
    public static function getPaginatedProducts($page, $limit, $categoryid)
    {
        global $cont;

        $start = ($page - 1) * $limit;

        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product";

        // Áp dụng thông tin lọc sản phẩm (nếu có)
        if ($categoryid) {
            // Thực hiện lọc theo danh mục
            $productSql .= " WHERE categoryid = '$categoryid'";
        }

        $productSql .= "  ORDER by created_at DESC LIMIT $start, $limit";

        $productResult = $cont->query($productSql);
        $data = [];

        if ($productResult->num_rows > 0) {
            while ($productRow = $productResult->fetch_assoc()) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data[$productId] = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image ORDER by id DESC";
        $imageResult = $cont->query($imageSql);

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if ($imageResult->num_rows > 0) {
            while ($imageRow = $imageResult->fetch_assoc()) {
                $productId = $imageRow['productid'];

                // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                if (isset($data[$productId])) {
                    // Thêm URL của ảnh vào mảng images của sản phẩm
                    $data[$productId]['images'][] = $imageRow['url'];
                }
            }
        }

        return $data;
    }
    public static function getPaginatedProducts2($page, $limit, $brandid)
    {
        global $cont;

        $start = ($page - 1) * $limit;

        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product";

        // Áp dụng thông tin lọc sản phẩm (nếu có)
        if ($brandid) {
            // Thực hiện lọc theo danh mục
            $productSql .= " WHERE brandid = '$brandid'";
        }

        $productSql .= " ORDER by created_at DESC LIMIT $start, $limit";

        $productResult = $cont->query($productSql);
        $data = [];

        if ($productResult->num_rows > 0) {
            while ($productRow = $productResult->fetch_assoc()) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data[$productId] = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image ORDER by id DESC";
        $imageResult = $cont->query($imageSql);

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if ($imageResult->num_rows > 0) {
            while ($imageRow = $imageResult->fetch_assoc()) {
                $productId = $imageRow['productid'];

                // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                if (isset($data[$productId])) {
                    // Thêm URL của ảnh vào mảng images của sản phẩm
                    $data[$productId]['images'][] = $imageRow['url'];
                }
            }
        }

        return $data;
    }

    public static function getAllTotalProducts()
    {
        global $cont;

        $sql = "SELECT COUNT(*) as total FROM product";
        $result = $cont->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }

        return 0;
    }


    public static function getTotalProducts($category)
    {
        global $cont;

        $sql = "SELECT COUNT(*) as total FROM product";

        // Áp dụng thông tin lọc sản phẩm (nếu có)
        if ($category) {
            // Thực hiện lọc theo danh mục
            $sql .= " WHERE categoryid = '$category'";
        }

        $result = $cont->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }

        return 0;
    }
    public static function getTotalProducts2($brandid)
    {
        global $cont;

        $sql = "SELECT COUNT(*) as total FROM product";

        // Áp dụng thông tin lọc sản phẩm (nếu có)
        if ($brandid) {
            // Thực hiện lọc theo danh mục
            $sql .= " WHERE brandid = '$brandid'";
        }

        $result = $cont->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }

        return 0;
    }

    public static function getproductbyid($id)
    {
        global $cont;
        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product where id = $id";
        $productResult = mysqli_query($cont, $productSql);

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image where productid = $id";
        $imageResult = mysqli_query($cont, $imageSql);

        $data = null;

        // Lấy dữ liệu từ bảng product
        if (mysqli_num_rows($productResult) > 0) {
            while ($productRow = mysqli_fetch_assoc($productResult)) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if (mysqli_num_rows($imageResult) > 0) {
            while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                $productId = $imageRow['productid'];

                // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                if (isset($data)) {
                    // Thêm URL của ảnh vào mảng images của sản phẩm
                    $data['images'][] = $imageRow['url'];
                }
            }
        }


        return $data;
    }
    public static function getallproductsById($cateid){
        global $cont ;
        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product WHERE categoryid = '$cateid'";
        $productResult = mysqli_query($cont,$productSql);

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image ORDER by id DESC";
        $imageResult = mysqli_query($cont,$imageSql);

        $data = [];

        // Lấy dữ liệu từ bảng product
        if (mysqli_num_rows($productResult) > 0) {
            while ($productRow = mysqli_fetch_assoc($productResult)) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data[$productId] = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if (mysqli_num_rows($imageResult) > 0) {
            while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                $productId = $imageRow['productid'];

                // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                if (isset($data[$productId])) {
                    // Thêm URL của ảnh vào mảng images của sản phẩm
                    $data[$productId]['images'][] = $imageRow['url'];
                }
            }
        }

        return $data;
    }
    public static function search($q)
    {
        global $cont;

        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product where name like '%$q%' ORDER by created_at DESC";
        $productResult = $cont->query($productSql);

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image ORDER by id DESC";
        $imageResult = $cont->query($imageSql);

        $data = [];

        // Lấy dữ liệu từ bảng product
        if ($productResult->num_rows > 0) {
            while ($productRow = $productResult->fetch_assoc()) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data[$productId] = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if ($imageResult->num_rows > 0) {
            while ($imageRow = $imageResult->fetch_assoc()) {
                $productId = $imageRow['productid'];

                // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                if (isset($data[$productId])) {
                    // Thêm URL của ảnh vào mảng images của sản phẩm
                    $data[$productId]['images'][] = $imageRow['url'];
                }
            }
        }

        return $data;
    }
    ////////////////////////
    public static function getproductsnew()
    {
        global $cont;
        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product ORDER by created_at DESC limit 5";
        $productResult = mysqli_query($cont, $productSql);

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image";
        $imageResult = mysqli_query($cont, $imageSql);

        $data = [];

        // Lấy dữ liệu từ bảng product
        if (mysqli_num_rows($productResult) > 0) {
            while ($productRow = mysqli_fetch_assoc($productResult)) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data[$productId] = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if (mysqli_num_rows($imageResult) > 0) {
            // $Pid = $value["product"]["id"];
            while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                foreach ($data as $value){
                    if ($value["product"]["id"] == $imageRow["productid"]) {
                        $productId = $imageRow['productid'];

                        // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                        if (isset($data[$productId])) {
                            // Thêm URL của ảnh vào mảng images của sản phẩm
                            $data[$productId]['images'][] = $imageRow['url'];
                        }
                    }
                }     
            }

        }

        return $data;
    }

    public static function getproductsprice()
    {
        global $cont;
        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product ORDER by price limit 3";
        $productResult = mysqli_query($cont, $productSql);

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image";
        $imageResult = mysqli_query($cont, $imageSql);

        $data = [];

        // Lấy dữ liệu từ bảng product
        if (mysqli_num_rows($productResult) > 0) {
            while ($productRow = mysqli_fetch_assoc($productResult)) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data[$productId] = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if (mysqli_num_rows($imageResult) > 0) {
            // $Pid = $value["product"]["id"];
            while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                foreach ($data as $value){
                    if ($value["product"]["id"] == $imageRow["productid"]) {
                        $productId = $imageRow['productid'];

                        // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                        if (isset($data[$productId])) {
                            // Thêm URL của ảnh vào mảng images của sản phẩm
                            $data[$productId]['images'][] = $imageRow['url'];
                        }
                    }
                }     
            }

        }

        return $data;
    }

    public static function getproductslimidted()
    {
        global $cont;
        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product ORDER by quantity limit 4";
        $productResult = mysqli_query($cont, $productSql);

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image";
        $imageResult = mysqli_query($cont, $imageSql);

        $data = [];

        // Lấy dữ liệu từ bảng product
        if (mysqli_num_rows($productResult) > 0) {
            while ($productRow = mysqli_fetch_assoc($productResult)) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data[$productId] = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if (mysqli_num_rows($imageResult) > 0) {
            // $Pid = $value["product"]["id"];
            while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                foreach ($data as $value){
                    if ($value["product"]["id"] == $imageRow["productid"]) {
                        $productId = $imageRow['productid'];

                        // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                        if (isset($data[$productId])) {
                            // Thêm URL của ảnh vào mảng images của sản phẩm
                            $data[$productId]['images'][] = $imageRow['url'];
                        }
                    }
                }     
            }

        }

        return $data;
    }
    ////////////////////// 
}
?>