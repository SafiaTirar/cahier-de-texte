<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showRegistrationForm()
{
    return view('auths.register');
}
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);
    $role = $request->input('role', 'user'); // Par défaut, 'user'

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $role, // Assurez-vous de valider le rôle
    ]);

    // Auth::login($user);

    return redirect()->route('login')->with('success', 'Compte créé avec succès. Connectez-vous pour continuer.');
}
public function showLoginForm()
{
    return view('auths.login');
}
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        return redirect()->intended('/dashboard');
    }

    return back()->with('error', 'Email ou mot de passe invalide.');
}
public function logout()
{
    Auth::logout();
    return redirect('/login');
}


}
