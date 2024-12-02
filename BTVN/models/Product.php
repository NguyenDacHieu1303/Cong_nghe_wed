<?php
session_start();

// Nếu chưa có danh sách sản phẩm, khởi tạo danh sách mặc định
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ["name" => "Sản phẩm 1", "price" => "1000 VND"],
        ["name" => "Sản phẩm 2", "price" => "2000 VND"],
        ["name" => "Sản phẩm 3", "price" => "3000 VND"],
    ];
}

$products = $_SESSION['products'];
?>
