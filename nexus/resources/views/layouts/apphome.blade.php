<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nexus')</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">    

   <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
</head>

<body class="bg-light">

    {{-- HEADER --}}
    <header class=" text-white py-3 shadow-sm">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">

            <div class="d-flex align-items-center gap-3 ">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Nexus" width="55">
                <h1 class="m-0 fs-2" style="font-style:oblique;">Nexus</h1>
            </div>

            <div class="text-center d-none d-md-block">
                <a href="{{ route('login') }}" class="btn btn-outline-light me-md-2 mb-2 mb-md-0">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Registrarse</a>
            </div>

        </div>
    </header>

    {{-- CONTENIDO PRINCIPAL --}}
    <main class="@yield('container', 'container py-5')">
        @yield('content')
    </main>

    {{-- FOOTER --}}
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

    <!-- JS BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
