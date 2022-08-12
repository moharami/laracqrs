<?php

namespace App\Queries;

use App\Models\Product;
use JetBrains\PhpStorm\ArrayShape;

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
