<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Mi App')</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">    

<link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        transition: margin-left 0.3s ease;
        
    }

   
    
    /* CONTENIDO PRINCIPAL */
    main {
        margin-top: 60px;  /* header */
        margin-bottom: 60px; /* footer */
        padding: 20px;
        min-height: calc(100vh - 120px);
        background: #f5f6fa;
        transition: margin-left 0.3s ease;
        height: 100vh;
    }

    main.shifted {
        margin-left: 260px; /* cuando sidebar abierto */
    }

  

    /* MODALES */
    .modal-content {
        border-radius: 8px;
    }

</style>
</head>
<body>

<!-- HEADER -->
<header>

     <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">

         <div class="d-flex align-items-center gap-3 ">
             <button id="sidebarToggle"><i class="fas fa-bars"></i></button>
           <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Nexus" width="55">
                <h1 class="m-0 fs-2" style="font-style:oblique;">Nexus</h1>
         </div>
         <div class="header-icons">
             <i class="fas fa-user btn btn-outline-light me-md-2 mb-2 mb-md-0" data-bs-toggle="modal" data-bs-target="#userModal"></i>
             <i class="fas fa-envelope btn btn-primary" data-bs-toggle="modal" data-bs-target="#messageModal"></i>
         </div>
    </div>
</header>

<!-- SIDEBAR -->
<aside id="sidebar">
    <div class="menu-header text-center mb-4">
        <img src="{{ asset('assets/img/logo.png') }}" width="70" class="mb-2">
        <h5>{{ Auth::user()->name }}</h5>
    </div>

    <nav>
        <h5>Principal</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-gauge"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-user"></i> Perfil
                </a>
            </li>
        </ul>

        <h5>Eventos</h5>

        <ul class="nav flex-column">

           <li class="nav-item">
                <a href="{{ route('eventos.create') }}" 
                     class="nav-link {{ request()->is('eventos/create') ? 'active' : '' }}">
                     <i class="fa-solid fa-plus"></i> Crear Evento
                 </a>
           </li>

           <li class="nav-item">
                <a href="{{ route('eventos.mios') }}" 
                    class="nav-link {{ request()->Is('eventos') ? 'active' : '' }}">
                    <i class="fa-solid fa-calendar-days"></i> Mis Eventos
                 </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('eventos.buscar') }}" 
                    class="nav-link {{ request()->Is('eventos/buscar') ? 'active' : '' }}">    
                <i class="fa-solid fa-magnifying-glass"></i> Buscar Eventos</a>
            </li>

            <li class="nav-item">
                 <a href="{{ route('eventos.inscritos') }}" 
                    class="nav-link {{ request()->is('eventos/inscritos') ? 'active' : '' }}">
                    <i class="fa-solid fa-ticket"></i> Eventos Inscritos
                </a>
            </li>

        </ul>




        <h5>Comunidades</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fa-solid fa-users"></i> Mis Foros</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="fa-solid fa-comments"></i> Crear Foro</a>
            </li>
        </ul>

        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100">
                <i class="fas fa-power-off"></i> Cerrar sesión
            </button>
        </form>
    </nav>
</aside>

<!-- CONTENIDO PRINCIPAL -->
<main id="mainContent">
   @yield('content')
</main>

<!-- FOOTER -->
  <footer class=" text-white py-4 mt-5">
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

<!-- MODALES -->
<!-- Usuario -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Información del usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p>Detalles del usuario...</p>
      </div>
    </div>
  </div>
</div>

<!-- Mensajes -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title" id="messageModalLabel">Mensajes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p>Lista de mensajes...</p>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Sidebar toggle JS -->
<script>
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const toggleBtn = document.getElementById('sidebarToggle');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        mainContent.classList.toggle('shifted');
    });
</script>

</body>
</html>
