<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public static function validationRules(): array
    {
        return [
            'full_name' => 'required|string',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|integer',
            'birth_date' => 'nullable|date',
        ];
    }
    public static function validationMessages(): array
    {
        return [
            'full_name.required' => 'El campo nombre es obligatorio.',
            'phone_number.integer' => 'El campo teléfono debe contener números.',
            'birth_date.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
        ];
    }
}