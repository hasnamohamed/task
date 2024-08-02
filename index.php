<?php
require_once 'config.php';
require_once 'src/Models/Product.php';
require_once 'src/Models/ProductManager.php';
require_once 'src/Controllers/ProductController.php';

use src\Controllers\ProductController;

$controller = new ProductController();

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'store':
        $controller->storeProduct();
        break;
    case 'add':
        $controller->addProduct();
        break;
    case 'massDelete':
        $controller->massDelete();
        break;
    case 'list':
    default:
        $controller->listProducts();
        break;
}
