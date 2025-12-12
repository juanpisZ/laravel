<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;


// Página Principal
Route::get('/', function () {
    return view('home');
});

// Mostrar formulario de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Procesar login
Route::post('/login', [LoginController::class, 'login'])->name('login.store');

// Mostrar formulario de registro
Route::get('/register', [RegisterController::class, 'create'])->name('register');

// Guardar usuario
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Dashboard protegido
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Cerrar sesión
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
