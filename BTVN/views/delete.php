<?php
session_start();

// Kiểm tra ID sản phẩm cần xóa
if (!isset($_GET['id']) || !is_numeric($_GET['id']) || !isset($_SESSION['products'][$_GET['id']])) {
    $_SESSION['error'] = 'ID sản phẩm không hợp lệ hoặc sản phẩm không tồn tại.';
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

// Lưu tên sản phẩm vào session để hiển thị thông báo
$productName = $_SESSION['products'][$id]['name'];

// Xóa sản phẩm
unset($_SESSION['products'][$id]);

// Cập nhật lại chỉ số mảng
$_SESSION['products'] = array_values($_SESSION['products']); 

// Thêm thông báo vào session
$_SESSION['message'] = "Sản phẩm '$productName' đã được xóa thành công!";

// Quay về trang chính
header("Location: index.php");
exit;
?>
