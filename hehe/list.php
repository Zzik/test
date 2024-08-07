<?php

require 'autoload.php';
require 'config.php';

use MyProject\Controller\ProductController;

header('Content-Type: application/json');

try {
    $db = getDbConnection();
    $controller = new ProductController($db);
    $products = $controller->listProducts();
    echo json_encode($products);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
