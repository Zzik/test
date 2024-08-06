<?php

try {
    $pdo = new PDO(${DATABASE_URL});
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL to select all items from the product table
    $sql = "SELECT * FROM product";
    
    // Prepare and execute the query
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    // Fetch all results as an associative array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Display the products
    foreach ($products as $product) {
        echo "SKU: " . $product['sku'] . "<br>";
        echo "Name: " . $product['name'] . "<br>";
        echo "Price: $" . $product['price'] . "<br>";
        echo "Attribute: " . $product['attribute_name'] . "<br>";
        echo "Value: " . $product['attribute_value'] . "<br>";
        echo "Created At: " . $product['created_at'] . "<br><br>";
    }
} catch(PDOException $e) {
    echo "Error retrieving products: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>
