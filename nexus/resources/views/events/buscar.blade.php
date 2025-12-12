@extends('layouts.appdashboard')

@section('title', 'Buscar Eventos')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Buscar eventos</h2>

    {{-- Barra de búsqueda --}}
    <form action="{{ route('eventos.buscar') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input 
                type="text" 
                name="q" 
                class="form-control" 
                placeholder="Buscar evento por título o descripción..." 
                value="{{ request('q') }}"
            >
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>

    {{-- Resultados --}}
    @if(isset($eventos))

        @if($eventos->count() > 0)

            <div class="row">
                @foreach($eventos as $evento)
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">

                            {{-- Imagen del evento --}}
                            @if($evento->imagen)
                                <img 
                                    src="{{ asset('storage/' . $evento->imagen) }}" 
                                    class="card-img-top" 
                                    style="height: 180px; object-fit: cover;"
                                >
                            @else
                                <img 
                                    src="https://via.placeholder.com/400x200?text=Sin+Imagen" 
                                    class="card-img-top"
                                >
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $evento->titulo }}</h5>

                                <p class="card-text text-muted">
                                    {{ Str::limit($evento->descripcion, 100) }}
                                </p>
                                
                                <p class="mb-1"><strong>Fecha:</strong> {{ $evento->fecha }}</p>

                               <a href="{{ route('eventos.show', $evento->id) }}" class="btn btn-outline-primary btn-sm mt-2">
                                     Ver detalles
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @else
            <div class="alert alert-warning">
                No se encontraron eventos para tu búsqueda.
            </div>
        @endif

    @endif

</div>
@endsection
