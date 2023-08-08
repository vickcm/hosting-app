<?php
namespace App\Http\Controllers;
use App\Models\User;

class UsersProductController extends Controller
{
    public function view($id)
    {
        $user = User::findOrFail($id);

        return view('users-products.view', [
            'user' => $user,
        ]);
    }
}
