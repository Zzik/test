<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'first_db');
define('DB_USER', 'root');
define('DB_PASS', '');
// define('DB_HOST', '64.226.82.78');
// define('DB_NAME', 'firstdb');
// define('DB_USER', 'sda');
// define('DB_PASS', 'ZxpMzs!F8Zb34(N');

function getDbConnection()
{
    try {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        return new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        die('Database connection failed: ' . $e->getMessage());
    }
}
