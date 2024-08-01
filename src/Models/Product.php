<?php
namespace src\Models;

class Product
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $attribute; // Store product-specific attribute
    protected $size;
    protected $weight;
    protected $height;
    protected $width;
    protected $length;
    public function __construct($id, $sku, $name, $price, $attribute, $size, $weight, $height, $width, $length)
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->attribute = $attribute;
        $this->size = $size;
        $this->weight = $weight;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
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
    public function getSize()
    {
        return $this->size;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function getHeight()
    {
        return $this->height;
    }
    public function getWidth()
    {
        return $this->width;
    }
    public function getLength()
    {
        return $this->length;
    }
}
