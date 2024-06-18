<?php

declare(strict_types=1);

use App\Controllers\CategoryController;
use App\Controllers\ProductController;
use Symfony\Component\Dotenv\Dotenv;

require '../loader.php';

$dotenv = new Dotenv();
$dotenv->load(path: BASE_PATH . '../.env');

$request = $_SERVER['REQUEST_URI'];

if ($request === '/') {
    $renderOutput = new ProductController();
    $renderOutput->renderProducts();
}

if ($request === '/categories/') {
    $renderOutput = new CategoryController();
    $renderOutput->renderCategories();
}
