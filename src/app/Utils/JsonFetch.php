<?php

namespace App\Utils;

use FetchApi;

class JsonFetch extends FetchApi
{
    public $productsJson = BASE_PATH . '/../resources/products.json';
    public $categoriesJson = BASE_PATH . '/../resources/categories.json';

    public function fetchJsonProducts()
    {
        if (file_exists($this->productsJson)) {
            $this->fetchJson(jsonFile: $this->productsJson);
        }

        $this->fetchApiProducts();
        return $this->fetchJson(jsonFile: $this->productsJson);
    }

    public function fetchJsonCategories()
    {
        if (file_exists($this->categoriesJson)) {
            $this->fetchJson(jsonFile: $this->categoriesJson);
        }

        $this->fetchApiCategories();
        return $this->fetchJson(jsonFile: $this->categoriesJson);
    }

    public function fetchJson($jsonFile)
    {
        $jsonContents = file_get_contents($jsonFile);
        return json_decode($jsonContents, true, 512, JSON_THROW_ON_ERROR);
    }
}
