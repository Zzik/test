<?php

require 'autoload.php';
require 'config.php';

use MyProject\Controller\ProductController;

header('Content-Type: application/json');

try {
    $db = getDbConnection();
    $controller = new ProductController($db);
    $exists = $controller->checkSKU();
    echo json_encode($exists);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
