<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;


// Pagina Principal
Route::get('/', function () {
    return view('home');
});

// Mostrar formulario de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// Mostrar formulario de registro
Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');

// Guardar usuario (sin validaciones por ahora)
Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');


// Dashboard - solo accesible para usuarios autenticados
/*Route::get('/dashboard',[DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');*/


