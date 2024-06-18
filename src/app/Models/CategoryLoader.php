<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\FilterApiContentsTrait;
use App\Utils\JsonFetch;

require '../import.php';

class CategoryLoader extends JsonFetch
{
    use FilterApiContentsTrait;

    public function filterCategoriesFromProducts(): array
    {
        $categories = [];
        $categoryData = $this->fetchJsonProducts();
        $content = $this->filterApiContents(jsonContent: $categoryData);
        foreach ($content as $category) {
            $categories[] = $category['category'];
        }
        return array_unique($categories);
    }
}
