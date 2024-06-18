<?php
declare(strict_types=1);

require 'vendor/autoload.php';

use App\Traits\ApiFetch;
use App\Utils\ApiToJsonConverter;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FetchApi
{
    use ApiFetch;

    public const APIURL = 'https://fakestoreapi.com/products';
    public const APICATEGORIESURL = 'https://fakestoreapi.com/products/categories';
    public HttpClientInterface $client;

    public function __construct()
    {
        $this -> client = HttpClient::create();
    }

    public function fetchApiProducts(): array
    {
        $products = $this->fetchApiContents(apiUrl: self::APIURL);
        $productsJson = new ApiToJsonConverter();
        $productsJson->createJson(apiContent: $products, apiUrl: self::APIURL);
        return $products;
    }

    public function fetchApiCategories(): array
    {
        $categories = $this->fetchApiContents(apiUrl: self::APICATEGORIESURL);
        $categoriesJson = new ApiToJsonConverter();
        $categoriesJson->createJson(apiContent: $categories, apiUrl: self::APICATEGORIESURL);
        return $categories;
    }
}
