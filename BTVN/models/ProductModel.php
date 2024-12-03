<?php
session_start();

class ProductModel {
    // Lấy tất cả sản phẩm
    public static function getAll() {
        // Trả về danh sách sản phẩm từ session hoặc mảng rỗng nếu chưa có
        return $_SESSION['products'] ?? [];
    }

    // Thêm sản phẩm mới
    public static function add($name, $price) {
        $products = self::getAll(); // Lấy danh sách sản phẩm hiện có
        $id = uniqid(); // Tạo ID duy nhất cho sản phẩm
        $products[$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $price
        ];
        $_SESSION['products'] = $products; // Cập nhật lại session
    }

    // Sửa thông tin sản phẩm
    public static function edit($id, $name, $price) {
        $products = self::getAll(); // Lấy danh sách sản phẩm hiện có

        if (isset($products[$id])) { // Kiểm tra nếu sản phẩm tồn tại
            $products[$id]['name'] = $name;
            $products[$id]['price'] = $price;
            $_SESSION['products'] = $products; // Cập nhật session
        } else {
            throw new Exception("Sản phẩm không tồn tại.");
        }
    }

    // Xóa sản phẩm
    public static function delete($id) {
        $products = self::getAll(); // Lấy danh sách sản phẩm hiện có

        if (isset($products[$id])) { // Kiểm tra nếu sản phẩm tồn tại
            unset($products[$id]);
            $_SESSION['products'] = $products; // Cập nhật lại session
        } else {
            throw new Exception("Sản phẩm không tồn tại.");
        }
    }
}
