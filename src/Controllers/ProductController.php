<?php

namespace sisiun\cqrs\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;
use sisiun\cqrs\CommandBus;
use sisiun\cqrs\Commands\CreateProductCommand;
use sisiun\cqrs\Queries\ProductSimpleQuery;

class ProductController
{
    public function __construct(public CommandBus $commandBus)
    {
    }

    public function create(Request $request): JsonResponse
    {
        $name = $request->query->get('name');
        $price = $request->query->get('price');
        $command = new CreateProductCommand($name, $price);
        $this->commandBus->handle($command);
        return response()->json([
            'message' => 'success'
        ]);
    }

    #[ArrayShape(['name' => "string", 'price' => "float"])]
    public function details(int $id): array
    {
        $query = new ProductSimpleQuery($id);
        return $query->getData();
    }
}

