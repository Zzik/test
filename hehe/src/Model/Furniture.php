<?php

namespace MyProject\Model;

class Furniture extends Product
{
    protected $attribute_value;
    protected $attribute_name;

    public function getAttributeValue()
    {
        return $this->attribute_value;
    }
    public function setAttributeValue()
    {
        $this->attribute_value = $_POST['width'].'x'.$_POST['height'].'x'.$_POST['length'] ?? null;
    }

    public function getAttributeName()
    {
        return $this->attribute_name;
    }
    public function setAttributeName()
    {
        $this->attribute_name = 'Dimensions';
    }
}
