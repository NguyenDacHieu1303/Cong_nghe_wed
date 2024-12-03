<?php
require_once 'models/ProductModel.php';

class ProductController {
    public function index() {
        $products = ProductModel::getAll();
        include '../views/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name'] ?? '');
            $price = htmlspecialchars($_POST['price'] ?? '');

            if (empty($name) || empty($price) || !is_numeric($price)) {
                $_SESSION['error'] = "Tên sản phẩm và giá phải hợp lệ!";
                header('Location: index.php?action=add');
                exit();
            }

            ProductModel::add($name, $price . " VND");
            header('Location: index.php');
            exit();
        }
        include '../views/add.php';
    }

    public function edit($id) {
        $product = ProductModel::getAll()[$id] ?? null;

        if (!$product) {
            header('Location: index.php');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name'] ?? '');
            $price = htmlspecialchars($_POST['price'] ?? '');

            if (empty($name) || empty($price) || !is_numeric($price)) {
                $_SESSION['error'] = "Tên sản phẩm và giá phải hợp lệ!";
                header('Location: index.php?action=edit&id=' . $id);
                exit();
            }

            ProductModel::edit($id, $name, $price . " VND");
            header('Location: index.php');
            exit();
        }

        include '../views/edit.php';
    }

    public function delete($id) {
        try {
            ProductModel::delete($id);
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
        }

        header('Location: index.php');
        exit();
    }
}
?>