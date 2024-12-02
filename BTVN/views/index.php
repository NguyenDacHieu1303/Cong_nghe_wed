<?php
session_start();

// Kiểm tra nếu danh sách sản phẩm chưa được khởi tạo trong session
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ["name" => "Sản phẩm 1", "price" => "1000 VND"],
        ["name" => "Sản phẩm 2", "price" => "2000 VND"],
        ["name" => "Sản phẩm 3", "price" => "3000 VND"]
    ];
}

// Lấy danh sách sản phẩm từ session
$products = $_SESSION['products'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Đảm bảo đường dẫn chính xác -->
</head>
<body>
    <header>
        <h1>Danh sách sản phẩm</h1>
        <a href="index.php?action=add" class="btn">Thêm sản phẩm</a>
    </header>

    <?php if (count($products) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $id => $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= htmlspecialchars($product['price']) ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?= $id ?>" class="btn">Sửa</a>
                            <a href="index.php?action=delete&id=<?= $id ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Không có sản phẩm nào trong danh sách.</p>
    <?php endif; ?>

</body>
</html>
