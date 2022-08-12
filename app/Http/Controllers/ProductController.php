<?php

namespace App\Http\Controllers;

use App\CommandBus;
use App\Commands\CreateProductCommand;
use App\Queries\ProductSimpleQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;

class ProductController extends Controller
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
