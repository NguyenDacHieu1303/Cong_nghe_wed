<!-- File: views/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Liên kết tới file CSS -->
</head>
<body>
    <header>
        <h1>Sửa sản phẩm</h1>
        <a href="index.php" class="btn">Quay lại</a>
    </header>

    <form method="POST" action="index.php?action=edit&id=<?= $id ?>">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($product['name']) ?>" required>

        <label for="price">Giá:</label>
        <input type="text" name="price" id="price" value="<?= htmlspecialchars(str_replace(' VND', '', $product['price'])) ?>" required>

        <button type="submit" class="btn">Lưu thay đổi</button>
    </form>
</body>
</html>
