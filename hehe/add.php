<?php

require 'autoload.php';
require 'config.php';

use MyProject\Controller\ProductController;
use MyProject\Model;

header('Content-Type: application/json');

try {
    $db = getDbConnection();
    $controller = new ProductController($db);

    $type = $_POST['type'] ?? null;

    if ($type) {
        $newest = 'MyProject\\Model\\'.$type;
        $product = new $newest();

        $product->setSku();
        $product->setName();
        $product->setPrice();

        $controller->addProduct($product);

        echo json_encode(['message' => 'Product added successfully']);
    } else {
        throw new Exception('Invalid input data');
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
