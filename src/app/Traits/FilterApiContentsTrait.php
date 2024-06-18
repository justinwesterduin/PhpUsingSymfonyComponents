<?php

declare(strict_types=1);

namespace App\Traits;

use App\Collection\ProductCollection;

trait FilterApiContentsTrait
{
    public function filterApiContents($jsonContent)
    {
        $productCollection = new ProductCollection();

        foreach ($jsonContent as $content) {
            unset($productCollection);
            $productCollection[ 'title' ] = $content[ 'title' ];
            $productCollection[ 'price' ] = $content[ 'price' ];
            $productCollection[ 'image' ] = $content[ 'image' ];
            $productCollection['category'] = $content['category'];
            $productCollection[ 'description' ] = $content[ 'description' ];
//            $productCollection['test'] = 'Append';
//            $productCollection['test2'] = 'Append Too';
//            $productCollection['test'] = [];
//            $productCollection['test'][0] = 'hoi';
            $contents[] = $productCollection;
        }
        return $contents;
    }
}
