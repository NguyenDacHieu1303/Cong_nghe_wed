<?php
// File: controllers/ProductController.php
require_once 'models/Product.php';

class ProductController {
    // Hiển thị tất cả sản phẩm
    public function index() {
        $products = Product::getAll();
        include 'views/index.php';
    }

    // Thêm sản phẩm mới
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $price = htmlspecialchars($_POST['price']) . " VND";
            Product::add($name, $price);
            header('Location: index.php');
            exit();
        }
        include 'views/add.php';
    }

    // Sửa thông tin sản phẩm
    public function edit($id) {
        $products = Product::getAll();
        
        // Kiểm tra xem sản phẩm có tồn tại không
        if (!isset($products[$id])) {
            // Nếu không tồn tại sản phẩm, điều hướng về trang chủ hoặc thông báo lỗi
            header('Location: index.php');
            exit();
        }
        
        $product = $products[$id];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $price = htmlspecialchars($_POST['price']) . " VND";
            Product::edit($id, $name, $price);
            header('Location: index.php');
            exit();
        }
        include 'views/edit.php';
    }

    // Xóa sản phẩm
    public function delete($id) {
        Product::delete($id);
        header('Location: index.php');
        exit();
    }
}
?>
