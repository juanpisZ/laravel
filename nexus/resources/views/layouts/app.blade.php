<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi App')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    body {
        display: flex;
        min-height: 100vh;
        background: #f5f6fa;
    }

    /* SIDEBAR */
    #sidebar {
        width: 260px;
        background: #1e1e2d;
        color: #fff;
        padding: 20px;
        box-shadow: 2px 0 10px rgba(0,0,0,0.4);
        display: flex;
        flex-direction: column;
    }

    #sidebar h5 {
        font-size: 14px;
        opacity: .7;
        margin-top: 20px;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    #sidebar .nav-link {
        padding: 12px 15px;
        border-radius: 6px;
        transition: all 0.25s ease;
        display: flex;
        align-items: center;
        gap: 12px;
        color: #dcdcdc !important;
        font-size: 15px;
    }

    /* Hover */
    #sidebar .nav-link:hover {
        background: linear-gradient(90deg, rgba(255,255,255,0.25), rgba(255,255,255,0.05));
        padding-left: 20px;
        transform: translateX(4px);
    }

    #sidebar .nav-link i {
        transition: transform 0.25s ease, opacity 0.2s;
        opacity: 0.8;
    }

    #sidebar .nav-link:hover i {
        transform: scale(1.2);
        opacity: 1;
    }

    .active {
        background: #4c4cff !important;
        color: white !important;
        box-shadow: 0 0 8px rgba(76,76,255,0.6);
    }
</style>

</head>

<body>
<!-- SIDEBAR -->
<aside id="sidebar">

    <div class="menu-header text-center mb-4">
        <img src="{{ asset('assets/img/logo.png') }}" width="70" class="mb-2">
        <h4>{{ Auth::user()->name }}</h4>
    </div>

    <nav>

        <!-- Principal -->
        <h5>Principal</h5>
        <ul class="nav flex-column">

            <li class="nav-item mb-1">
                <a href="{{ route('dashboard') }}" 
                   class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-gauge"></i> Dashboard
                </a>
            </li>

            <li class="nav-item mb-1">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-user"></i> Perfil
                </a>
            </li>

        </ul>

        <!-- Eventos -->
        <h5>Eventos</h5>
        <ul class="nav flex-column">

            <li class="nav-item mb-1">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-plus"></i> Crear Evento
                </a>
            </li>

            <li class="nav-item mb-1">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-calendar-days"></i> Mis Eventos
                </a>
            </li>

            <li class="nav-item mb-1">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-magnifying-glass"></i> Buscar Eventos
                </a>
            </li>

        </ul>

        <!-- Foros -->
        <h5>Comunidades</h5>
        <ul class="nav flex-column">

            <li class="nav-item mb-1">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-users"></i> Mis Foros
                </a>
            </li>

            <li class="nav-item mb-1">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-comments"></i> Crear Foro
                </a>
            </li>

        </ul>

    </nav>


   
   <form action="{{ route('logout') }}" method="POST" class="mt-4">
    @csrf
    <button 
        type="submit"
        class="flex items-center gap-3 w-full px-4 py-2 text-sm font-medium 
               text-red-400 hover:text-red-300 hover:bg-red-900/30 
               transition-all duration-150 rounded-lg">
        <i class="fas fa-power-off"></i>
        Cerrar sesión
    </button>
   </form>




</aside>





 {{-- CONTENIDO PRINCIPAL --}}
  <main class="p-4" style="flex-grow: 1;">
    @yield('content')
</main>


{{-- FOOTER --}}
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center d-flex flex-column gap-3">

            <p class="mb-0">© 2025 Nexus. Todos los derechos reservados.</p>

            <div>
                <a href="#" class="text-white mx-2"><i class="fa-brands fa-facebook fa-lg"></i></a>
                <a href="#" class="text-white mx-2"><i class="fa-brands fa-x-twitter fa-lg"></i></a>
                <a href="#" class="text-white mx-2"><i class="fa-brands fa-instagram fa-lg"></i></a>
                <a href="#" class="text-white mx-2"><i class="fa-brands fa-linkedin fa-lg"></i></a>
            </div>

        </div>
    </footer>
</body>
</html>


























