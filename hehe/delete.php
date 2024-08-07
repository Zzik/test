<?php

require 'autoload.php';
require 'config.php';

use MyProject\Controller\ProductController;

try {
    $db = getDbConnection();
    $controller = new ProductController($db);

    $input = json_decode(file_get_contents('php://input'), true);
    $skus = $input['skus'] ?? [];

    if (!empty($skus) && is_array($skus)) {
        $controller->deleteProducts($skus);
        echo json_encode(['message' => 'Products deleted successfully']);
    } else {
        echo $input;
        throw new Exception('Invalid input data');
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
