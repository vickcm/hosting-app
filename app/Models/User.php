<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as BaseUser;
use Illuminate\Notifications\Notifiable;
class User extends BaseUser
{
//    use HasFactory;
    use Notifiable;

    protected $primaryKey = "user_id";

    // La propiedad $hidden permite definir qué valores de la tabla Laravel debe ignorar al momento de
    // serializar el objeto a un string (por ejemplo, un JSON).
    protected $hidden = ["password", "remember_token"];
}