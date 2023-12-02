<?php
    include("config.php");
    $cont = mysqli_connect($servername,$username,$password,$dbname);
    if(!$cont){
        die("Lỗi kết nối cơ sở dữ liệu ".mysqli_connect_error());
    }
?>