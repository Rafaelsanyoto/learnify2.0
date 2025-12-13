<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

   public function store()
{
    $attributes = request()->validate([
        'name' => ['required', 'max:50'],
        'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
        'password' => ['required', 'confirmed', 'min:5', 'max:20'],
        'agreement' => ['accepted'],
    ]);

    unset($attributes['agreement']);
    $attributes['password'] = bcrypt($attributes['password']);
    $attributes['role'] = 'user';

    $user = User::create($attributes);

    Auth::login($user);

    return redirect('/');
}

}
