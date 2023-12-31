<?php
require_once "config/connect.php";
class Configuration
{
    public static function getConfigurationByIdProduct($productId)
    {
        global $cont;
        $sql = "SELECT * FROM configuration WHERE productid = ?";

        // Sử dụng prepared statement để tránh lỗi SQL Injection
        $stmt = $cont->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();

        $configuration = [];

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $configuration = $row;
        }

        return $configuration;
    }

}
?>