<?php

namespace MyProject\Controller;

use MyProject\Model;
use PDO;

class ProductController
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
// it shouldve collapsed after i saved


// 
    public function listProducts()
    {
        $stmt = $this->db->query('SELECT * FROM product ORDER BY sku');
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public function deleteProducts(array $skus)
    {
        $placeholders = implode(',', array_fill(0, count($skus), '?'));
        $stmt = $this->db->prepare("DELETE FROM product WHERE sku IN ($placeholders)");
        $stmt->execute($skus); 
    }
    public function addProduct($product)
    {
        $sql = 'INSERT INTO product (sku, name, price, attribute_name, attribute_value) 
            VALUES (:sku, :name, :price, :attribute_name, :attribute_value)';
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':sku' => $product->getSku(),
            ':name' => $product->getName(),
            ':price' => $product->getPrice(),
            ':attribute_name' => $product->getAttributeName(),
            ':attribute_value' => $product->getAttributeValue()
        ]);
    }

    public function checkSKU() {

        $sku = $_GET['sku'];

        $sql = 'SELECT COUNT(*) FROM product WHERE sku = :sku';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':sku', $sku);
        $stmt->execute();
    
        $count = $stmt->fetchColumn();
    
        return $count > 0;
    }

}
