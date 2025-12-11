@extends('layouts.apphome')

@section('title', 'Iniciar Sesión')

@section('container', 'container d-flex justify-content-center align-items-center min-vh-100')

@section('content')
<div class="w-100" style="max-width: 420px;">

    <!-- Título -->
    <h1 class="text-center mb-4 fw-bold">Iniciar Sesión</h1>
   
    <!-- Mensajes de error -->
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error:</strong> {{ $errors->first() }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


    <!-- Avatar -->
    <div class="text-center mb-4">
    <i class="fa-solid fa-circle-user text-primary" style="font-size: 110px;"></i>
    </div>


    <!-- Formulario -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Usuario -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Correo</label>
            <input type="text" class="form-control" name="email" required placeholder="Ingresa tu correo electrónico" value="{{ old('email') }}">
        </div>

        <!-- Contraseña -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Contraseña</label>
            <input type="password" class="form-control" name="password" required placeholder="Ingresa tu contraseña">
        </div>

        <!-- Botones -->
        <div class="d-grid gap-2 mt-4">
            <button type="submit" class="btn btn-primary">Entrar</button>
            <a href="{{ route('register') }}" class="btn btn-outline-secondary">Crear cuenta</a>
        </div>

        <!-- Olvidé contraseña -->
        <div class="text-center mt-3">
            <a href="#" class="text-decoration-none">
                Olvidé mi contraseña
            </a>
        </div>

    </form>
</div>
@endsection
