<?php
require_once 'config/database.php';
require_once 'controllers/ProductController.php';

$database = new Database();
$db = $database->getConnection();

$controller = new ProductController($db);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'add':
        $controller->addProduct();
        break;
    case 'edit':
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $controller->editProduct($id);
        break;
    case 'delete':
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $controller->deleteProduct($id);
        break;
    case 'index':
    default:
        $controller->showAllProducts();
        break;
}
?>
