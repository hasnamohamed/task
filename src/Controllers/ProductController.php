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

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sku = isset($_POST['sku']) ? $_POST['sku'] : '';
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : 0;
            $attribute = isset($_POST['attribute']) ? $_POST['attribute'] : '';
            $size = isset($_POST['size']) ? $_POST['size'] : null;
            $weight = isset($_POST['weight']) ? $_POST['attribute'] : null;
            $height = isset($_POST['height']) ? $_POST['attribute'] : null;
            $width = isset($_POST['width']) ? $_POST['attribute'] : null;
            $length = isset($_POST['length']) ? $_POST['attribute'] : null;

            // Determine product type and set attributes accordingly
            // Here, for simplicity, we assume Product is concrete
            $product = new \src\Models\Product(null, $sku, $name, $price, $attribute);
            $this->productManager->saveProduct($product);

            header('Location: ../../../index.php?action=list');
            exit;
        }

        require 'src/Views/products/add_product.php';
    }

    public function listProducts()
    {
        $products = $this->productManager->getProducts();
        require 'src/Views/products/product_list.php';
    }

    public function massDelete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ids = isset($_POST['ids']) ? $_POST['ids'] : [];
            if (!empty($ids)) {
                $this->productManager->deleteProducts($ids);
            }
            header('Location: ../../../index.php?action=list');
            exit;
        }
    }
}
