<?php
   require_once "client/models/product.php";
   require_once "client/models/Images.php";
   require_once "client/models/Configuration.php";
    
    class ProductsController{
        public function index(){
    
           
            $limit = 9;

        // Lấy tham số trang từ request (nếu không có, mặc định là trang 1)
        $page = isset($_GET['page']) ? $_GET['page'] : 1;


        if(isset($_GET['categoryid'])){
            $categoryid = $_GET['categoryid'];
            $products = product::getPaginatedProducts($page, $limit, $categoryid);
            $totalProducts = product::getTotalProducts($categoryid);
        }
        else if(isset($_GET["brandid"])){
            $brandid = $_GET["brandid"];
            $products = product::getPaginatedProducts2($page, $limit, $brandid);
            $totalProducts = product::getTotalProducts2($brandid);
        }
        else{
            $products = product::getAllPaginatedProducts($page, $limit);
            $totalProducts = product::getAllTotalProducts();
        }
        $totalPages = ceil($totalProducts / $limit);
       
        
include 'client/views/products.php';
        }
        public function DetailProduct(){

            if(isset($_GET["id"])){
                $id = $_GET["id"];
                $product = product::getproductbyid($id);
                include 'client/views/productDetail.php';
            }else{
                header( 'location:?controller=products');
            }
        }

        function search(){
            if(isset($_POST["q"])){
                $products= product::search($_POST["q"]);
                
            } 
            else{
                $products =product::getallproducts(); 
            }
            include 'client/views/searchproduct.php';

        }

    }
?>