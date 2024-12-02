<!-- File: views/add.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Liên kết tới file CSS -->
</head>
<body>
    <header>
        <h1>Thêm sản phẩm mới</h1>
        <a href="index.php" class="btn">Quay lại</a>
    </header>

    <form method="POST" action="index.php?action=add">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" id="name" required>

        <label for="price">Giá:</label>
        <input type="text" name="price" id="price" required>

        <button type="submit" class="btn">Thêm sản phẩm</button>
    </form>
</body>
</html>



