<?php
session_start();

// Kiểm tra ID sản phẩm cần xóa
if (!isset($_GET['id']) || !is_numeric($_GET['id']) || !isset($_SESSION['products'][$_GET['id']])) {
    $_SESSION['error'] = 'ID sản phẩm không hợp lệ.';
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Lưu tên sản phẩm vào session để hiển thị thông báo
$productName = $_SESSION['products'][$id]['name'];

// Xóa sản phẩm
unset($_SESSION['products'][$id]);
$_SESSION['products'] = array_values($_SESSION['products']); // Cập nhật chỉ số mảng

// Thêm thông báo vào session
$_SESSION['message'] = "Sản phẩm '$productName' đã được xóa thành công!";

// Quay về trang chính
header("Location: index.php");
exit;
?>
