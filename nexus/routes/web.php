<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
// Pagina Principal
Route::get('/', function () {
    return view('home');
});

// Mostrar formulario de registro
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Mostrar formulario de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// Mostrar formulario de registro
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])
    ->name('register');

// Guardar usuario (sin validaciones por ahora)
Route::post('/register', [app\Http\Controllers\Auth\RegisterController::class, 'store'])
    ->name('register.store');


   Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
