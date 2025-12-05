@extends('layouts.apphome')
@section('title', 'Inicio')

@section('content')

    {{--REGISTRO--}}
    <section style="min-height: 75vh;"  class="mb-5 text-center  d-flex flex-column justify-content-center align-items-round">
        <h2 class="fw-bold fs-1">Regístrate o Inicia Sesión</h2>
        <p class="mt-4 fs-3">Prepárate para la experiencia NEXUS. ¡No dejes pasar esta oportunidad!</p>

        <div class="d-flex justify-content-center gap-3 mt-3">
         <a href="{{ route('register') }}" class="btn btn-primary">Registrarse</a>
         <a href="{{ route('login') }}" class="btn btn-outline-primary">Iniciar Sesión</a>
        </div>

        <p class="mt-3 fst-italic">Nexus es vínculo, Nexus es conexión</p>
    </section>

   {{--EVENTOS--}}
    <section style = "min-height: 70vh;" class="section-box mb-5  d-flex flex-column justify-content-center align-items-round">
        <h2 class="fw-bold mb-3 text-center fs-2">Eventos</h2>

        <div class="row align-items-center">
            <div class="col-md-6 fs-3">
                <p>No te quedes atrás, comparte tus ideas y habilidades.</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('assets/img/evento.jpg') }}" alt="evento" class="img-fluid rounded shadow">
            </div>
        </div>
    </section>

    {{--FOROS--}}
    <section style = "min-height: 70vh;" class="section-box mb-5   d-flex flex-column justify-content-center align-items-round">
        <h2 class="fw-bold mb-3 text-center fs-2">Foros</h2>

        <div class="row align-items-center">
            <div class="col-md-6 fs-3">
                <p>No te pierdas lo que los demás comparten, ¡diviértete!</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('assets/img/foro.png') }}" alt="foro" class="img-fluid rounded shadow">
            </div>
        </div>
    </section>

    {{--CALIFICA--}}
    
    <section style = "min-height: 70vh;" class="section-box mb-5   d-flex flex-column justify-content-center align-items-round">
        <h2 class="fw-bold mb-3 text-center fs-2 pd">Califica</h2>

        <div class="row align-items-center">
            <div class="col-md-6 fs-3">
                <p>Clasifica tus experiencias con usuarios, eventos y foros.</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('assets/img/califica.webp') }}" alt="califica" class="img-fluid rounded shadow">
            </div>
        </div>
    </section>

@endsection
