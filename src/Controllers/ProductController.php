<?php
namespace src\Controllers;

use src\Models\ProductManager;

class ProductController
{
    private $productManager;

    public function __construct()
    {
        $this->productManager = new ProductManager();
    }

    public function storeProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sku = isset($_POST['sku']) ? $_POST['sku'] : '';
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : 0;
            $attribute = isset($_POST['attribute']) ? $_POST['attribute'] : '';
            $size = isset($_POST['size']) ? $_POST['size'] : null;
            $weight = isset($_POST['weight']) && is_numeric($_POST['weight']) ? $_POST['weight'] : null;
            $height = isset($_POST['height']) && is_numeric($_POST['height']) ? $_POST['height'] : null;
            $width = isset($_POST['width']) && is_numeric($_POST['width']) ? $_POST['width'] : null;
            $length = isset($_POST['length']) && is_numeric($_POST['length']) ? $_POST['length'] : null;

            $product = new \src\Models\Product(null, $sku, $name, $price, $attribute, $size, $weight, $height, $width, $length);
            $this->productManager->saveProduct($product);

            header('Location:/task/index.php?action=list');
            exit;
        }

        require 'src/Views/products/create.php';
    }

    public function listProducts()
    {
        $products = $this->productManager->getProducts();
        require 'src/Views/products/index.php';
    }
    public function addProduct()
    {
        header('Location: src/Views/products/create.php');
            exit;
    }

    public function massDelete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ids = isset($_POST['ids']) ? $_POST['ids'] : [];
            if (!empty($ids)) {
                $this->productManager->deleteProducts($ids);
            }
            header('Location:/task/index.php?action=list');
            exit;
        }
    }
}
