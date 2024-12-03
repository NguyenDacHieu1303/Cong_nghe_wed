<?php
class ProductModel {
    private $conn;
    private $table_name = "products";

    public $id;
    public $name;
    public $price;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy tất cả sản phẩm
    public function getAllProducts() {
        $query = "SELECT id, name, price FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Thêm sản phẩm mới
    public function addProduct() {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, price=:price";
        $stmt = $this->conn->prepare($query);

        // Liên kết các tham số
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Lấy sản phẩm theo ID
    public function getProductById() {
        $query = "SELECT id, name, price FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

    // Cập nhật sản phẩm
    public function updateProduct() {
        $query = "UPDATE " . $this->table_name . " SET name=:name, price=:price WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Xóa sản phẩm
    public function deleteProduct() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
