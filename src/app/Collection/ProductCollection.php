<?php

namespace App\Collection;

use ArrayAccess;

class ProductCollection implements ArrayAccess
{
//
    public array $container = [
//        ['title',
//        'price',
//        'description',
//        'rating',
//        'image']
    ];

    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[ $offset ] = $value;
        }
    }

    public function offsetExists($offset): bool
    {
        return isset($this->container[ $offset ]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->container[ $offset ]);
    }

    public function offsetGet($offset): mixed
    {
        return $this->container[ $offset ] ?? null;
    }
}
