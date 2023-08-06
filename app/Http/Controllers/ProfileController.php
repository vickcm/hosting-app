<?php
namespace App\Http\Controllers;

use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function viewProfile()
    {
        // Obtener el usuario autenticado
        $user = auth()->user();

        // Obtener el perfil asociado al usuario (si existe)
        $profile = $user->profile;

        // Formatear la fecha de nacimiento (si existe)
        if ($profile) {
            $profile->formatted_birth_date = Carbon::parse($profile->birth_date)->format('d/m/Y');
        }

        // Obtener los productos contratados por el usuario que no esten cancelados, chequear status, campo boolean true o false. True para vigentes, false para cancelados
        $contractedProducts = $user->products()->wherePivot('status', true)->get();

        return view('profiles.viewProfile', compact('user', 'profile', 'contractedProducts'));
    }

    public function editProfile()
    {
        return view('profiles.editProfile');
    }
}