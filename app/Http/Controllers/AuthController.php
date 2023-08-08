<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Mostrar el formulario de inicio de sesión
    public function showLogin()
    {
        return view('auth.login');
    }

    // Procesar el inicio de sesión
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
           return auth()->user()->role === User::ROLE_ADMIN ? redirect()->intended('/dashboard') : (auth()->user()->role === User::ROLE_USER ? redirect()->intended('/dashboardu') : abort(403, 'Acceso no autorizado'));
        } else {
            // La autenticación falló
            return back()->withInput()->withErrors(['email' => 'Credenciales incorrectas']);
        }
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

