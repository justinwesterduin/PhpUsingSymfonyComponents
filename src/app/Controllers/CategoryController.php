<?php

namespace App\Controllers;

use App\Models\CategoryLoader;
use App\Traits\SetTwigEnvTrait;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class CategoryController
{
    use SetTwigEnvTrait;

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function renderCategories(): void
    {

        $categoryLoader = new CategoryLoader();
        $twig = $this->setTwigEnv();
        $categories = $categoryLoader->filterCategoriesFromProducts();
        echo $twig->render('categories.html.twig', ['categories' => $categories]);
    }
}
