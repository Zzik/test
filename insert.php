<?php


try {
    $pdo = new PDO($_ENV['DATABASE_URL']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL to insert 3 product items
    $sql = "INSERT INTO product (sku, name, price, attribute_name, attribute_value) VALUES
            ('SKU12345', 'Product 1', 19.99, 'Color', 'Red'),
            ('SKU67890', 'Product 2', 29.99, 'Size', 'Medium'),
            ('SKU54321', 'Product 3', 9.99, 'Weight', '1kg')";

    // Execute the query
    $pdo->exec($sql);
    
    echo "3 product items inserted successfully";
} catch(PDOException $e) {
    echo "Error inserting product items: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>
