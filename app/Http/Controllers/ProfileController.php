<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    public function editProfile(int $id)

    {
        try {
            $profile = Profile::findOrFail($id);

            return view('profiles.editProfile', [
                'profile' => $profile
            ]);
        } catch (\Exception $e) {

            return redirect()
                ->route('home')
                ->with('message', 'Perfil no encontrado')
                ->with('type', 'danger');
        }
    }

    public function processEditProfile(Request $request, int $id)
    {
        try {
            $profile = Profile::findOrFail($id);

            $validatedData = $request->validate(Profile::validationRules(), Profile::validationMessages());

            // Ahora puedes actualizar el perfil con los datos validados
            $profile->update($validatedData);

            // Redirige a la página de edición con un mensaje de éxito
            return redirect()
                ->route('profiles.viewProfile',)
                ->with('message', 'Perfil actualizado exitosamente.')
                ->with('type', 'success');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {

            return redirect()
                ->route('home')
                ->with('message', '$e->getMessage()')
                ->with('type', 'danger');

            // Manejar otras excepciones, como no encontrar el perfil
            // Puedes redirigir a una página de error o hacer lo que necesites
        }
    }
    public function createProfile()

    {
        return view('profiles.createProfile');
    }

    public function processCreateProfile(request $request) {

        try {
            $data = $request->except(['_token']);
            $request->validate(Profile::validationRules(), Profile::validationMessages());
            // le tengo que agregar el campo del user_id al array $data
            $data['user_id'] = auth()->user()->user_id;

            Profile::create($data);
            return redirect()
                ->route('profiles.viewProfile')
                ->with('message', 'Perfil creado correctamente')
                ->with('type', 'success');
        } catch (\Exception $e) {
            return redirect()
                ->route('home')
                ->with('message', 'Error al crear el perfil')
                ->with('type', 'danger');
        }

    }
}
