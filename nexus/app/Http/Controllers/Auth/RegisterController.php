<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller 
{
    // Mostrar formulario 
    public function create()
    {
        return view('registro'); 
    }

    // Guardar usuario 
    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // validar foto
        ]);

        // Inicializar datos para crear usuario
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        // Subir foto si se cargó
        if ($request->hasFile('avatar')) {
            $archivo = $request->file('avatar');
            $nombre = time() . '_' . $archivo->getClientOriginalName();
            $archivo->storeAs('public/avatars', $nombre); // guarda en storage/app/public/avatars
            $data['avatar'] = 'avatars/' . $nombre; // guarda la ruta relativa en DB
        } else {
            $data['avatar'] = null; // o 'default.jpg' si quieres un avatar por defecto
        }

        // Crear usuario
        User::create($data);

        return view('auth.login')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }
}
