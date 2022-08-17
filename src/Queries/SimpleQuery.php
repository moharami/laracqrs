<?php

namespace sisiun\cqrs\Queries;

use Illuminate\Database\Eloquent\Model;

class SimpleQuery
{
    private array $result;

    public function __construct(public Model $model, public int $id)
    {
    }

    public function getData(): array
    {
        $product = $this->model::query()->findOrFail($this->id);
        $this->makeResult($product);
        return $this->result;
    }

    public function makeResult($product)
    {
        $this->result = [];
        foreach ($this->model->getFillable() as $item) {
            $this->result[$item] = $product[$item];
        }
    }
}
