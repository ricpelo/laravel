<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login()
    {
        $validados = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $usuario = DB::table('users')->where('email', $validados['email']);

        if ($usuario->exists()) {
            $usuario = ($usuario->get())[0];

            if (password_verify($validados['password'], $usuario->password)) {
                session(['usuario' => $validados['email']]);
                return redirect('/')->with('success', 'El usuario ha iniciado sesión.');
            }
        }

        return redirect()->back()->with('error', 'Usuario o contraseña incorrectos.');
    }

    public static function logueado()
    {
        return request()->session()->has('usuario');
    }
}
