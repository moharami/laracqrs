<?php

namespace App\Commands;

use App\Models\Product;

class CreateProductHandler
{
    public function __invoke(CreateProductCommand $command): void
    {
        $product = new Product();
        $product->name = $command->getName();
        $product->price = $command->getPrice();
        $product->save();
        // other logic
    }
}
