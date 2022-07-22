<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

$parts = explode("/", $_SERVER["REQUEST_URI"]);


$id = $parts[2] ?? null;

$database = new Database("localhost", "product_db", "root", "");

$gateway = new ProductGateway($database);

$controller = new ProductController($gateway);

$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);

?>















