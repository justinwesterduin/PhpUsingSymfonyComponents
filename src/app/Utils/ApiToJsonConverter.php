<?php

namespace App\Utils;

use FetchApi;

class ApiToJsonConverter extends FetchApi
{
    public function createJson($apiContent, $apiUrl)
    {
        $json = json_encode($apiContent, JSON_PRETTY_PRINT);
        if ($apiUrl === 'https://fakestoreapi.com/products') {
            file_put_contents(BASE_PATH . '/../resources/products.json', $json);
        }
        if ($apiUrl === 'https://fakestoreapi.com/products/categories') {
            file_put_contents(BASE_PATH . '/../resources/categories.json', $json);
        }
    }
}
