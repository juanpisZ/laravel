@extends('layouts.appdashboard')

@section('title', $evento->titulo)

@section('content')
<div class="container mt-4">

    <div class="card shadow">

        {{-- Imagen grande --}}
        @if($evento->imagen)
            <img src="{{ asset('storage/' . $evento->imagen) }}" 
                class="card-img-top" 
                style="height: 300px; object-fit: cover;">
        @else
            <img src="https://via.placeholder.com/800x300?text=Sin+Imagen" 
                class="card-img-top">
        @endif

        <div class="card-body">

            <h2>{{ $evento->titulo }}</h2>

            <p class="text-muted">
                <strong>Fecha:</strong> {{ $evento->fecha }}
            </p>

            <p>
                <strong>Ubicación:</strong> {{ $evento->ubicacion ?? 'No especificada' }}
            </p>

            <p>
                <strong>Categoría:</strong> {{ $evento->categoria ?? 'Sin categoría' }}
            </p>

            <p>
                <strong>Estado:</strong> {{ ucfirst($evento->estado) }}
            </p>

            <p class="mt-3">
                <strong>Descripción:</strong><br>
                {{ $evento->descripcion ?? 'Sin descripción' }}
            </p>

            <hr>

            {{-- Mostrar quién creó el evento --}}
            <p class="text-muted">
                <strong>Creado por:</strong> {{ $evento->user->name }}
            </p>

            <a href="{{ route('eventos.buscar') }}" class="btn btn-secondary">
                Volver a la búsqueda
            </a>

            {{-- Si es el dueño, mostrar botones --}}
            @auth
                @if(Auth::id() == $evento->user_id)
                    <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning">
                        Editar
                    </a>

                    <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            Eliminar
                        </button>
                    </form>
                @endif


                        @if($yaParticipa)
                         <button class="btn btn-secondary" disabled>Ya estás inscrito</button>
                        @else
                        <form action="{{ route('eventos.participar', $evento->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Participar</button>
                        </form>
                        @endif

            @endauth

        </div>
    </div>

</div>
@endsection
