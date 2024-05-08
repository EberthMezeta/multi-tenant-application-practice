<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthTenantController extends Controller
{
    public function showLoginForm()
    {
        return view('tenant.auth.login');
    }

    // Método para mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('tenant.auth.register');
    }

    // Método para el registro de un nuevo usuario
    public function register(Request $request)
    {
        // Valida los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crea un nuevo usuario
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Autentica al usuario después de registrarse
        Auth::login($user);

        // Redirige al usuario a la página de inicio de los inquilinos
        return redirect('/');
    }

    // Método para iniciar sesión de un usuario existente
    public function login(Request $request)
    {
        // Valida los datos de entrada
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Intenta autenticar al usuario con las credenciales proporcionadas
        if (Auth::attempt($validatedData)) {
            // Si tiene éxito, redirige al usuario a la página deseada
            return redirect('/');
        }

        // Si la autenticación falla, redirige de nuevo al formulario de inicio de sesión con errores
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    // Método para cerrar sesión del usuario
    public function logout()
    {
        Auth::guard('users')->logout(); // Cierra la sesión del usuario

        // Redirige al formulario de inicio de sesión
        return redirect()->route('tenant.login');
    }

}
