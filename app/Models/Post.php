<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{

    // Listamos los datos que deben aceptarse en los arrays para create() y update().
    protected $fillable = ['title', 'content', 'image', 'image_description', 'author_id', 'category_id'];
    // use HasFactory;


    /*
    |--------------------------------------------------------------------------
    | function str limit limita a cantidad de caracteres a mostrar 
        @param int $long para determinar cuantos caracteres se van a mostrar
        retorna un string
    |--------------------------------------------------------------------------
     */

    public static function validationRules(): array
    {
        return [
            'title' => 'required|min:5',
            'content' => 'required|min:30',
            'category_id' => 'required',
            'author_id' => 'required',
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'title.required' => 'El campo título es obligatorio',
            'title.min' => 'El campo título debe tener al menos 5 caracteres',
            'content.required' => 'El campo contenido es obligatorio',
            'content.min' => 'El campo contenido debe tener al menos 30 caracteres',
            'category_id.required' => 'Debe seleccionar una categoría',
            'author_id.required' => 'Debe seleccionar un autor',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id', 'author_id');
    }
}