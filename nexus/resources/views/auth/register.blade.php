@extends('layouts.apphome')

@section('title', 'Registro de Usuario')

@section('container', 'container d-flex justify-content-center align-items-center min-vh-100')

@section('content')

<div class="card shadow p-4" style="width: 420px;">

    <h2 class="text-center mb-4 fw-bold">Crear Cuenta</h2>

    {{-- CAJA DE ERRORES --}}
    @if ($errors->any())
        <div class="alert alert-danger p-3 mb-3" style="border-radius: 10px;">
            <ul class="mb-0" style="list-style: none; padding-left: 0;">
                @foreach ($errors->all() as $error)
                    <li>🔴 {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-user"></i>
                </span>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Correo</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto de perfil (opcional)</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-image"></i>
                </span>
                <input type="file" name="avatar" accept="image/*" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Crear cuenta
        </button>

        <p class="text-center mt-3">
            ¿Ya tienes una cuenta?
            <a href="{{ route('login') }}">Iniciar Sesión</a>
        </p>

    </form>
</div>

@endsection
