<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;



// Página Principal
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

// Guardar usuario
Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');



// Procesar login
Route::post('/login', [LoginController::class, 'login'])->name('login.post');


// Dashboard - Página protegida
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


// Cerrar sesión
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
