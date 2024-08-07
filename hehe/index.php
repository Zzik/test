<?php

$request = $_SERVER['REQUEST_URI'];

echo json_decode($request);
echo $request;
echo DATABASE_URL;