<?php

namespace MyProject\Model;

class Book extends Product
{
    protected $attribute_value;
    protected $attribute_name;



    public function getAttributeValue()
    {
        return $this->attribute_value;
    }
    public function setAttributeValue()
    {
        $this->attribute_value = $_POST['weight'] . 'KG' ?? null;
    }

    public function getAttributeName()
    {
        return $this->attribute_name;
    }
    public function setAttributeName()
    {
        $this->attribute_name = 'Weight';
        // $this->attribute_name = $_POST['attribute_name'] ?? null;
    }

    
}
