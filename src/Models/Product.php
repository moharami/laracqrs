<?php

namespace sisiun\cqrs\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property float $price
 */
class Product extends Model
{
    protected $fillable = [
        'name',
        'product'
    ];
}
