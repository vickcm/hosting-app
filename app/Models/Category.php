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
            'name' => 'required',
            'description' => 'required',
        ];
    }

    public static function validationMessages():array 
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'description.required' => 'El campo descripción es obligatorio',
        ];
    }   
    // use HasFactory;
}