@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<h2 class="fw-bold mb-4">Hola, {{ $user->name }} 👋</h2>

<div class="row g-4">

    <!-- Eventos creados -->
    <div class="col-md-4">
        <div class="card shadow border-0 text-center p-4">
            <i class="fa-solid fa-calendar-days fa-2x text-primary mb-2"></i>
            <h5 class="fw-bold">Eventos creados</h5>
            <p class="fs-1 fw-bold m-0">{{ $eventosCreados }}</p>
        </div>
    </div>

    <!-- Foros creados -->
    <div class="col-md-4">
        <div class="card shadow border-0 text-center p-4">
            <i class="fa-solid fa-comments fa-2x text-success mb-2"></i>
            <h5 class="fw-bold">Foros creados</h5>
            <p class="fs-1 fw-bold m-0">{{ $forosCreados }}</p>
        </div>
    </div>

    <!-- Fecha registro -->
    <div class="col-md-4">
        <div class="card shadow border-0 text-center p-4">
            <i class="fa-solid fa-clock fa-2x text-warning mb-2"></i>
            <h5 class="fw-bold">Miembro desde</h5>
            <p class="fs-5 fw-bold m-0">{{ $user->created_at->format('d/m/Y') }}</p>
        </div>
    </div>

</div>

<!-- SECCIÓN DE LISTAS -->
<div class="row mt-5">

    <!-- Últimos eventos -->
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0"><i class="fa-solid fa-clock-rotate-left me-2"></i>Últimos 5 eventos</h5>
            </div>
            <div class="card-body">

                @forelse ($ultimosEventos as $evento)
                    <p class="mb-2"> {{ $evento->titulo }}</p>
                @empty
                    <p class="text-muted text-center">No tienes eventos recientes.</p>
                @endforelse

            </div>
        </div>
    </div>

    <!-- Últimos foros -->
    <div class="col-md-6">
        <div class="card shadow border-0">
            <div class="card-header bg-success text-white">
                <h5 class="m-0"><i class="fa-solid fa-comments me-2"></i>Últimos 5 foros</h5>
            </div>
            <div class="card-body">

                @forelse ($ultimosForos as $foro)
                    <p class="mb-2"> {{ $foro->titulo }}</p>
                @empty
                    <p class="text-muted text-center">No tienes foros recientes.</p>
                @endforelse

            </div>
        </div>
    </div>

</div>

@endsection
