<?php

// function cors() {
//     // Allow from any origin
//     if (isset($_SERVER['HTTP_ORIGIN'])) {
//         header("Access-Control-Allow-Origin: *");
//         header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
//         header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
//         header('Access-Control-Allow-Credentials: true');
//         header('Access-Control-Max-Age: 86400');    // cache for 1 day
//     }

//     // Access-Control headers are received during OPTIONS requests
//     if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

//         if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
//             // may also be using PUT, PATCH, HEAD etc
//             header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");

//         if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
//             header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");

//         exit(0);
//     }
// }
// cors();

spl_autoload_register(function ($class) {
    // Project-specific namespace prefix
    $prefix = 'MyProject\\';

    // Base directory for the namespace prefix
    $base_dir = __DIR__ . '/src/';

    // Does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // No, move to the next registered autoloader
        return;
    }

    // Get the relative class name
    $relative_class = substr($class, $len);

    // Replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // If the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});
