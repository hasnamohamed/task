<?php

namespace src\Models;

class Product
{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $attribute;
    protected $attributes = []; // Use associative array to handle different attributes

    public function __construct($id, $sku, $name, $price, $attribute, $attributes = [])
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->attribute = $attribute;
        $this->attributes = $attributes;
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

    public function getAttributeValue($key)
    {
        return $this->attributes[$key] ?? null;
    }
}
