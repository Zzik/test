<?php

try {
    $pdo = new PDO($_ENV['DATABASE_URL']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL to create the product table with sku as the primary key
    $sql = "CREATE TABLE IF NOT EXISTS product (
        sku VARCHAR(50) PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        attribute_name VARCHAR(255),
        attribute_value VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    // Execute the query
    $pdo->exec($sql);
    
    echo "Table 'product' created successfully with 'sku' as the primary key";
} catch(PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>
