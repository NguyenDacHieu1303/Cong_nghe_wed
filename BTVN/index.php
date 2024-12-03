<?php 
session_start(); 

// Lấy danh sách sản phẩm từ session hoặc khởi tạo mảng rỗng nếu chưa có
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ["name" => "Sản phẩm 1", "price" => "1000 VND"],
        ["name" => "Sản phẩm 2", "price" => "2000 VND"],
        ["name" => "Sản phẩm 3", "price" => "3000 VND"],
    ];
}
$products = $_SESSION['products'];

include 'header.php'; 
?>

<main>
    <button class="btn-add" onclick="window.location.href='add.php'">Thêm mới</button>
    <table>
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá thành</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $id => $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= htmlspecialchars($product['price']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $id ?>" class="btn-edit">✏️</a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?= $id ?>" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">🗑️</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<style>
    main {
        padding: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }
    table th {
        background-color: #f2f2f2;
    }
    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .btn-add {
        margin-bottom: 20px;
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    .btn-add:hover {
        background-color: #0056b3;
    }
    .btn-edit, .btn-delete {
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    .btn-edit {
        background-color: #ffc107;
        color: white;
    }
    .btn-edit:hover {
        background-color: #e0a800;
    }
    .btn-delete {
        background-color: #dc3545;
        color: white;
    }
    .btn-delete:hover {
        background-color: #c82333;
    }
</style>

<?php include 'footer.php'; ?>
