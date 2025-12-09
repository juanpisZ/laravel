<?php

namespace App\Http\Controllers;

//permite recibir los datos que envía el formulario
use Illuminate\Http\Request;

//es el modelo de tu tabla users en la base de datos sin esto no podra buscar usuarios
use App\Models\User;

//es para comparar o crear contraseñas encriptadas
use Illuminate\Support\Facades\Hash;

//es un comando de larabel q es para verificar, es para iniciar sesion
use Illuminate\Support\Facades\Auth;

//sirve para lanzar errores si el login falla
use Illuminate\Validation\ValidationException;

class LoginController extends Controller{

    public function showLoginForm(){
       
        //esto es para q cuando al usaurio entre a la opcion login, larabel automaticamente llamara a esta funcion
        return view('auth.login');
    }

    public function login (Request $request){

        //Esto es para q el usuario ingrese los datos correctamente 
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

            //Verifica en los datos si coincide con un usuario
        if (Auth::attempt($credentials)){

            //Crea la sesion si los datos fueron correctos
            $request->session()->regenerate();

            //Lo envia a la pgaina de inicio si el usuario no especifico a donde ir ejm(perfil de usuario antes de iniciar sesion)
            return redirect()->intended(route('home'));
        }

            //Si no encuentra los datos, lanzara el mensaje de error
        throw ValidationException::withMessages(
            ['name' => ['Datos ingresados incorrectos'],
        ]);

    }

    public function logout(Request $request){
        //Si el usuario lo presiona lo saca de la sesion
        Auth::logout();
        //luego borra la info de la sesion, esto es para evitar q un hacker no use esa sesion del usuario
        $request->session()->invalidate();
        //Esto porq si alguien llega a tener el token viejo ya no sirve para entrar
        $request->session()->regenerateToken();
        //envia al usuario a la pagina de inicio
        return redirect('/login');
    }
}