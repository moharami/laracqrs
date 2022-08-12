<?php

namespace App\Commands;

/**
 *
 */
class CreateProductCommand
{
    /**
     * @param string $name
     * @param float $price
     */
    public function __construct(public string $name, public float $price)
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
}
