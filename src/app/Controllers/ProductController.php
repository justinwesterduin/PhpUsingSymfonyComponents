<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\ProductLoader;
use App\Traits\SetTwigEnvTrait;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

require '../vendor/autoload.php';

class ProductController
{
    use SetTwigEnvTrait;

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function renderProducts(): void
    {
        $productLoader = new ProductLoader();
        $twig = $this->setTwigEnv();
        $products = $productLoader->filterProducts();
        echo $twig->render('index.html.twig', ['products' => $products]);
    }
}
