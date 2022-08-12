<?php

namespace App\Models;

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
