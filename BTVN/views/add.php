<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Đường dẫn tới file CSS -->
</head>
<body>
    <header>
        <h1>Thêm sản phẩm mới</h1>
        <a href="index.php" class="btn">Quay lại</a>
    </header>

    <!-- Hiển thị thông báo lỗi (nếu có) -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="error">
            <?= htmlspecialchars($_SESSION['error']); ?>
        </div>
        <?php unset($_SESSION['error']); // Xóa lỗi sau khi hiển thị ?>
    <?php endif; ?>

    <form method="POST" action="index.php?action=add">
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" name="name" id="name" placeholder="Nhập tên sản phẩm" required>
        </div>

        <div class="form-group">
            <label for="price">Giá (VND):</label>
            <input type="text" name="price" id="price" placeholder="Nhập giá sản phẩm" required>
        </div>

        <button type="submit" class="btn">Thêm sản phẩm</button>
    </form>
</body>
</html>
