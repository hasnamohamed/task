<?php

namespace src\Models;

class ProductManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=' . DB_PORT, DB_USER, DB_PASS);
    }
    public function getPdo()
    {
        return $this->pdo;
    }
    public function saveProduct(Product $product)
    {
        $stmt = $this->pdo->prepare('INSERT INTO products (sku, name, price, attribute, size, weight, height, width, length) VALUES (:sku, :name, :price, :attribute, :size, :weight, :height, :width, :length)');
        $size = $product->getAttributeValue('size') !== '' ? $product->getAttributeValue('size') : null;
        $weight = $product->getAttributeValue('weight') !== '' ? $product->getAttributeValue('weight') : null;
        $height = $product->getAttributeValue('height') !== '' ? $product->getAttributeValue('height') : null;
        $width = $product->getAttributeValue('width') !== '' ? $product->getAttributeValue('width') : null;
        $length = $product->getAttributeValue('length') !== '' ? $product->getAttributeValue('length') : null;
        $stmt->execute([
            ':sku' => $product->getSku(),
            ':name' => $product->getName(),
            ':price' => $product->getPrice(),
            ':attribute' => $product->getAttribute(),
            ':size' => $size,
            ':weight' => $weight,
            ':height' => $height,
            ':width' => $width,
            ':length' => $length,
        ]);
    }

    public function getProducts()
    {
        $stmt = $this->pdo->query('SELECT id, sku, name, price, attribute, size, weight, height, width, length FROM products ORDER BY id');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteProducts(array $ids)
    {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $this->pdo->prepare('DELETE FROM products WHERE id IN (' . $placeholders . ')');
        $stmt->execute($ids);
    }
}
