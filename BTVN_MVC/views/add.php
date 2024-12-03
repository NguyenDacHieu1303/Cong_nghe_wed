<?php include 'templates/header.php'; ?>

<h1>Thêm mới</h1>
<form method="POST" action="index.php?action=add">
    <label for="name">Sản Phẩm</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="price">Giá Thành</label>
    <input type="text" id="price" name="price" required><br><br>

    <input type="submit" value="Add Product">
</form>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $price = htmlspecialchars($_POST['price']) . " VND";
    $_SESSION['products'][] = ["name" => $name, "price" => $price];
    header('Location: index.php');
    exit();
}
?>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .form-container h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>

<?php include 'templates/footer.php'; ?>
