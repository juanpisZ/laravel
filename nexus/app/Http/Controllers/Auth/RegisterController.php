<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5'
        ], [
            'email.unique' => 'El correo ya está registrado'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        if ($request->hasFile('avatar')) {
            $archivo = $request->file('avatar');
            $nombre = time() . '_' . $archivo->getClientOriginalName();
            $archivo->storeAs('public/avatars', $nombre);
            $data['avatar'] = 'avatars/' . $nombre;
        }

        User::create($data);

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente');
    }
}
