@extends('layouts.apphome')

@section('title', 'Dashboard')

@section('content')

<div class="d-flex">

    <!-- ASIDE LATERAL -->
    <aside id="sidebar" class="bg-dark text-white p-3" style="width: 260px; min-height: 100vh;">
        <div class="menu-lateral">

            <div class="menu-header text-center mb-4">
                <img src="{{ asset('assets/img/logo.png') }}" width="70" class="mb-2">
                <h4>{{ $user->name }}</h4>
            </div>

            <nav>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ route('dashboard') }}" class="nav-link text-white">
                            <i class="fa-solid fa-gauge me-2"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-white">
                            <i class="fa-solid fa-user me-2"></i> Perfil
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-white">
                            <i class="fa-solid fa-plus me-2"></i> Crear Evento
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-white">
                            <i class="fa-solid fa-calendar-days me-2"></i> Mis Eventos
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-white">
                            <i class="fa-solid fa-users me-2"></i> Mis Foros
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link text-white">
                            <i class="fa-solid fa-comments me-2"></i> Crear Foro
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="flex-grow-1 p-4">

        <h2 class="fw-bold mb-4">Dashboard</h2>

        <div class="row g-4">

            <!-- TARJETA: Eventos creados -->
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-calendar-days fa-2x text-primary mb-3"></i>
                        <h5 class="card-title">Eventos creados</h5>
                        <p class="fs-1 fw-bold">{{ $eventosCreados }}</p>
                    </div>
                </div>
            </div>

            <!-- TARJETA: Foros creados -->
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-users fa-2x text-success mb-3"></i>
                        <h5 class="card-title">Foros creados</h5>
                        <p class="fs-1 fw-bold">{{ $forosCreados }}</p>
                    </div>
                </div>
            </div>

            <!-- TARJETA: Invitaciones (futuro) -->
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-envelope fa-2x text-warning mb-3"></i>
                        <h5 class="card-title">Invitaciones recibidas</h5>
                        <p class="fs-1 fw-bold">0</p> <!-- por ahora -->
                    </div>
                </div>
            </div>

        </div>

    </main>

</div>

@endsection
