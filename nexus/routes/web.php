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


/*
              AUTHENTICATION ROUTES
*/


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


/*
           EVENTOS ROUTES
*/

// Rutas para creacion de eventos
Route::middleware(['auth'])->group(function () {
    Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');

    // Rutas para creación de eventos
    Route::get('/eventos/create', [EventoController::class, 'create'])->name('eventos.create');
    Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');

    // Rutas para edición de eventos
    Route::get('/eventos/{id}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
    Route::put('/eventos/{id}', [EventoController::class, 'update'])->name('eventos.update');

    // Ruta para eliminar eventos
    Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->name('eventos.destroy');

    // Ruta para participar en un evento
    Route::post('/eventos/{id}/participar', [App\Http\Controllers\EventoController::class, 'participar'])
    ->name('eventos.participar');
    
    // Ruta para ver mis eventos
    Route::get('/mis-eventos', [EventoController::class, 'misEventos'])
    ->middleware('auth')
    ->name('eventos.mios');
  
    // Ruta para ver eventos inscritos
    Route::get('/eventos/inscritos', [EventoController::class, 'inscritos'])
    ->name('eventos.inscritos')
    ->middleware('auth');
    
   // Ruta para desinscribirse de un evento
    Route::delete('/eventos/{evento}/desinscribir', [EventoController::class, 'desinscribir'])
    ->name('eventos.desinscribir');


});

//Buscar eventos

Route::get('/eventos/buscar', [EventoController::class, 'buscar'])->name('eventos.buscar');

// Ver detalles de un evento 
Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show');

    

