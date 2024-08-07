<?php

namespace MyProject\Model;

abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;

    public function __construct()
    {
        $this-> setAttributeName();
        $this-> setAttributeValue();
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

    public function setSku()
    {
        $this->sku = $_POST['sku'] ?? null;
    }
    public function setName()
    {
        $this->name = $_POST['name'] ?? null;
    }
    public function setPrice()
    {
        $this->price = $_POST['price'] ?? null;
    }


    abstract public function getAttributeName();
    abstract public function getAttributeValue();
    abstract public function setAttributeName();
    abstract public function setAttributeValue();

}
