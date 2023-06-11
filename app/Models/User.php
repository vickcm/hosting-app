<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as BaseUser;
use Illuminate\Notifications\Notifiable;
class User extends BaseUser
{
//    use HasFactory;
    use Notifiable;
    protected $primaryKey = "user_id";
    protected $hidden = ["password", "remember_token"];
    protected $fillable = [
        'username',
        'email',
        'password',
        
    ];

    public static function validationRules(): array
    {
        return [
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ];
    }

    public static function validationMessages(): array
    {
        return [
            'username.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El campo email debe ser un email válido',
            'email.unique' => 'El email ya está registrado',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.min' => 'El campo contraseña debe tener al menos 6 caracteres',
        ];
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'users_has_products', 'user_id', 'product_id');
    }

    
}