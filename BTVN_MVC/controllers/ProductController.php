<?php
require_once 'models/ProductModel.php';

class ProductController {
    private $model;

    public function __construct($db) {
        $this->model = new ProductModel($db);
    }

    // Hiển thị tất cả sản phẩm
    public function showAllProducts() {
        $stmt = $this->model->getAllProducts();
        include 'views/index.php';
    }

    // Thêm sản phẩm mới
    public function addProduct() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->model->name = $_POST['name'];
            $this->model->price = $_POST['price'];

            if ($this->model->addProduct()) {
                header('Location: index.php');
            } else {
                echo "Error adding product.";
            }
        } else {
            include 'views/add.php';
        }
    }

    // Chỉnh sửa sản phẩm
    public function editProduct($id) {
        $this->model->id = $id;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->model->name = $_POST['name'];
            $this->model->price = $_POST['price'];

            if ($this->model->updateProduct()) {
                header('Location: index.php');
            } else {
                echo "Error updating product.";
            }
        } else {
            $stmt = $this->model->getProductById();
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            include 'views/edit.php';
        }
    }

    // Xóa sản phẩm
    public function deleteProduct($id) {
        $this->model->id = $id;
        if ($this->model->deleteProduct()) {
            header('Location: index.php');
        } else {
            echo "Error deleting product.";
        }
    }
}
?>
