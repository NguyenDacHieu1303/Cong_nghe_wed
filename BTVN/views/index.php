<!-- File: views/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Liên kết tới file CSS -->
</head>
<body>
    <header>
        <h1>Danh sách sản phẩm</h1>
        <a href="index.php?action=add" class="btn">Thêm sản phẩm</a>
    </header>

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
</body>
</html>




