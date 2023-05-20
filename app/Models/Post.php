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

    // usar Str::limit() para acortar el contenido de los posts 
    public function getShortContent($text, $limit)
    {
        return Str::limit($text, $limit);
    }

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
            'category_id.required' => 'El campo categoría es obligatorio',
            'author_id.required' => 'El campo autor es obligatorio',


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
