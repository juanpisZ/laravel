@extends('layouts.appdashboard')

@section('title', 'Eventos Inscritos')

@section('content')

<div class="container">
    <h2 class="mb-4">Eventos en los que estoy inscrito</h2>

    @if ($eventos->isEmpty())
        <div class="alert alert-info">No estás inscrito en ningún evento aún.</div>
    @else
        <div class="row">
            @foreach ($eventos as $evento)
                <div class="col-md-4">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $evento->titulo }}</h5>
                            <p class="card-text">{{ $evento->descripcion }}</p>

                            <p class="text-muted mb-1"><i class="fa-solid fa-calendar-day"></i> 
                                {{ $evento->fecha }}
                            </p>
                            <p class="text-muted"><i class="fa-solid fa-location-dot"></i> 
                                {{ $evento->ubicacion }}
                            </p>

                            <form action="{{ route('eventos.desinscribir', $evento->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger w-100">
                                    <i class="fa-solid fa-xmark"></i> Cancelar inscripción
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $eventos->links() }}

    @endif
</div>

@endsection
