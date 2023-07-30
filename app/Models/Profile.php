<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* $table->id('profile_id');
$table->unsignedBigInteger('user_id')->unique();
$table->string('full_name')->nullable(false);
$table->string('address')->nullable();
$table->string('phone_number', 20)->nullable();
$table->date('birth_date')->nullable();
$table->timestamps(); */

class Profile extends Model
{
    use HasFactory;
    protected $primaryKey = "profile_id";
    protected $fillable = [
        'user_id',
        'full_name',
        'address',
        'phone_number',
        'birth_date',
        
    ];
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id', 'user_id');
    }
}
