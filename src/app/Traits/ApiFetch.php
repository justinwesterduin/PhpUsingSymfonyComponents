<?php

declare(strict_types=1);

namespace App\Traits;

trait ApiFetch
{
    public function fetchApiContents($apiUrl): array
    {
        //$client injecteren ipv $this->>client
        $response = $this->client->request(
            'GET',
            $apiUrl
        );
        $statusCode = $response->getStatusCode();
        $contentType = $response->getHeaders()[ 'content-type' ][ 0 ];
        $content = $response->getContent();
        return $response->toArray();
    }
}
