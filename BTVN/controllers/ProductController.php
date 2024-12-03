<?php
session_start();
require_once '../models/ProductModel.php';


// Kiểm tra xem danh sách sản phẩm đã có trong session chưa, nếu chưa thì khởi tạo
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

class ProductController {
    // Hiển thị sản phẩm
    public function index() {
        include '../views/index.php';
    }

    // Thêm sản phẩm
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $price = htmlspecialchars($_POST['price']);
            if (empty($name) || empty($price) || !is_numeric($price)) {
                $_SESSION['error'] = "Tên và giá sản phẩm không hợp lệ!";
                header('Location: index.php?action=add');
                exit();
            }
            $_SESSION['products'][] = ['name' => $name, 'price' => $price . " VND"];
            header('Location: index.php');
            exit();
        }
        include '../views/add.php';
    }

    // Sửa sản phẩm
    public function edit($id) {
        $product = $_SESSION['products'][$id] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['products'][$id] = [
                'name' => htmlspecialchars($_POST['name']),
                'price' => htmlspecialchars($_POST['price']) . " VND"
            ];
            header('Location: index.php');
            exit();
        }
        include '../views/edit.php';
    }

    // Xóa sản phẩm
    public function delete($id) {
        unset($_SESSION['products'][$id]);
        $_SESSION['products'] = array_values($_SESSION['products']); // Đảm bảo mảng liên tục
        header('Location: index.php');
        exit();
    }
}

// Khởi tạo controller và xử lý các hành động
$controller = new ProductController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'add': $controller->add(); break;
    case 'edit': $controller->edit($id); break;
    case 'delete': $controller->delete($id); break;
    default: $controller->index(); break;
}
?>
