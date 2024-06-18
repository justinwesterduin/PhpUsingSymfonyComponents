<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\FilterApiContentsTrait;
use App\Utils\JsonFetch;

require '../import.php';

class ProductLoader extends JsonFetch
{
    use FilterApiContentsTrait;

    public function filterProducts(): array
    {
        $productData = $this->fetchJsonProducts();
        return $this->filterApiContents(jsonContent: $productData);
    }
}
