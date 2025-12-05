@extends('layouts.apphome')

@section('title', 'Registro de Usuario')

@section('container', 'container d-flex justify-content-center align-items-center min-vh-100')

@section('content')

<div class="card shadow p-4" style="width: 420px;">
    <h2 class="text-center mb-4 fw-bold">Crear Cuenta</h2>

    <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nombre --}}
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-user"></i>
                </span>
                <input type="text" name="name" class="form-control" placeholder="Ingresa tu nombre" required>
            </div>
        </div>

        {{-- Correo --}}
        <div class="mb-3">
            <label class="form-label">Correo</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <input type="email" name="email" class="form-control" placeholder="Ingresa tu correo" required>
            </div>
        </div>

        {{-- Contraseña --}}
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input type="password" name="password" class="form-control" placeholder="Crea una contraseña" required>
            </div>
        </div>

        {{-- Foto de perfil --}}
        <div class="mb-3">
            <label class="form-label">Foto de perfil</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-image"></i>
                </span>
                <input type="file" name="avatar" accept="image/*" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Crear cuenta</button>

        <p class="text-center mt-3">
            ¿Ya tienes una cuenta?
            <a href="{{ route('login') }}">Iniciar Sesión</a>
        </p>
    </form>
</div>

@endsection
