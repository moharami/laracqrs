<?php

namespace sisiun\cqrs\Queries;

use JetBrains\PhpStorm\ArrayShape;
use sisiun\cqrs\Models\Product;

class ProductSimpleQuery
{
    public function __construct(public int $productId)
    {
    }

    #[ArrayShape(['name' => "string", 'price' => "float"])]
    public function getData(): array
    {
        $product = Product::query()->findOrFail($this->productId);
        return [
            'name' => $product->name,
            'price' => $product->price
        ];
    }
}
