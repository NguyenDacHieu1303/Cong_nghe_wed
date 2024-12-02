<?php
session_start();

// Kiểm tra ID sản phẩm cần xóa
if (!isset($_GET['id']) || !isset($_SESSION['products'][$_GET['id']])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Xóa sản phẩm
unset($_SESSION['products'][$id]);
$_SESSION['products'] = array_values($_SESSION['products']); // Cập nhật chỉ số mảng

// Quay về trang chính
header("Location: index.php");
exit;
?>
