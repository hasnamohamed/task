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
        session_start();
        $errors = [];
        $isValid = true;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sku = isset($_POST['sku']) ? trim($_POST['sku']) : '';
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $price = isset($_POST['price']) ? trim($_POST['price']) : '';
            $attribute = isset($_POST['attribute']) ? trim($_POST['attribute']) : '';

            if (empty($sku)) {
                $errors['sku'] = 'SKU is required.';
                $isValid = false;
            } elseif ($this->skuExists($sku)) {
                $errors['sku'] = 'SKU already exists. Please choose a different SKU.';
                $isValid = false;
            }

            if (empty($name)) {
                $errors['name'] = 'Product Name is required.';
                $isValid = false;
            }

            if (empty($price) || !is_numeric($price) || $price <= 0) {
                $errors['price'] = 'Price must be a positive number.';
                $isValid = false;
            }

            if (empty($attribute)) {
                $errors['attribute'] = 'Product Type is required.';
                $isValid = false;
            }

            if ($isValid) {
                try {
                    $attributes = [];

                    // Collect attributes based on the product type
                    switch ($attribute) {
                        case 'dvd':
                            $attributes['size'] = $_POST['size'] ?? null;
                            break;
                        case 'book':
                            $attributes['weight'] = $_POST['weight'] ?? null;
                            break;
                        case 'furniture':
                            $attributes['height'] = $_POST['height'] ?? null;
                            $attributes['width'] = $_POST['width'] ?? null;
                            $attributes['length'] = $_POST['length'] ?? null;
                            break;
                        default:
                            $errors['attribute'] = 'Invalid product type.';
                            break;
                    }

                    if (empty($errors['attribute'])) {
                        $product = new \src\Models\Product(
                            null,
                            $sku,
                            $name,
                            $price,
                            $attribute,
                            $attributes
                        );
                        $this->productManager->saveProduct($product);

                        // Redirect to the list page on successful save
                        header('Location: /task/index.php?action=list');
                        exit;
                    } else {
                        $errors['general'] = 'Invalid product type.';
                    }
                } catch (\PDOException $e) {
                    $errors['general'] = 'An error occurred while saving the product. Please try again.';
                }
            }

            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST; // Save the form data to repopulate the form
            header('Location: /task/index.php?action=add');
            exit;
        } else {
            require 'src/Views/products/add-product.php';
        }
    }

    private function skuExists($sku)
    {
        $stmt = $this->productManager->getPdo()->prepare('SELECT COUNT(*) FROM products WHERE sku = :sku');
        $stmt->execute([':sku' => $sku]);
        return $stmt->fetchColumn() > 0;
    }


    public function listProducts()
    {
        $products = $this->productManager->getProducts();
        require 'src/Views/products/index.php';
    }
    public function addProduct()
    {
        header('Location: src/Views/products/add-product.php');
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
