<?php
namespace src\Models;

abstract class Product
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $attribute; // Store product-specific attribute

    public function __construct($id, $sku, $name, $price, $attribute)
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->attribute = $attribute;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getAttribute()
    {
        return $this->attribute;
    }
}
