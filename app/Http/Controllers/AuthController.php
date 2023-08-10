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
        return view('auth.login');  // Devuelve la vista del formulario de inicio de sesión.
    }

    // Procesar el inicio de sesión
    public function login(Request $request)
    {
        // Valida los datos del formulario de inicio de sesión.
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {  // Intenta autenticar al usuario con las credenciales proporcionadas.
            // Verifica el rol del usuario autenticado y redirige según el rol.
            return auth()->user()->role === User::ROLE_ADMIN ? redirect()->intended('/dashboard') 
                : (auth()->user()->role === User::ROLE_USER ? redirect()->intended('/dashboardu') 
                : abort(403, 'Acceso no autorizado'));
        } else {
            // La autenticación falló, redirige de regreso al formulario con errores.
            return back()->withInput()->withErrors(['email' => 'Credenciales incorrectas']);
        }
    }

    // Cerrar sesión
    public function logout()
    {
        Auth::logout();  // Cierra la sesión del usuario autenticado.
        return redirect('/login');  // Redirige al usuario al formulario de inicio de sesión.
    }
}
