<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = "category_id";

    protected $fillable = [
        'name',
        'description',
    ];

    public function posts() 
    {
        return $this->hasMany(Post::class, 'category_id', 'category_id');
    }

    public static function validationRules():array 
    {
        return [
            'name' => 'required|min:3',
            'description' => 'required|min:20',
        ];
    }

    public static function validationMessages():array 
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'name.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'description.required' => 'El campo descripción es obligatorio',
            'description.min' => 'El campo descripción debe tener al menos 20 caracteres',
        ];
    }   
    // use HasFactory;
}