<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;



class Product extends Model
{
    protected $primaryKey = "product_id";
    protected $fillable = ['title', 'subtitle', 'description'];

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (int $value): float  => $value / 100,
            set: fn (float $value)       => $value * 100,
        );
    }
}
