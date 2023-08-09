<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\User;

class Product extends Model
{
    protected $primaryKey = "product_id";
    protected $fillable = ['title', 'subtitle', 'description', 'price'];
    
    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (int $value): float  => $value / 100,
            set: fn (float $value)       => $value * 100,
        );
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_has_products', 'product_id', 'user_id');
    }
}