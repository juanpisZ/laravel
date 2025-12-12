@extends('layouts.appdashboard')

@section('title', 'Mis Eventos')

@section('content')
<div class="container mt-4">
    <h2>Mis Eventos</h2>

    <a href="{{ route('eventos.create') }}" class="btn btn-primary mb-3">Crear nuevo evento</a>

    @if ($eventos->isEmpty())
        <p>No tienes eventos creados.</p>
    @else
        <ul class="list-group">
            @foreach ($eventos as $evento)
                <li class="list-group-item d-flex justify-content-between align-items-center">

                    <div>
                        <strong>{{ $evento->titulo }}</strong><br>
                        <small>{{ $evento->fecha }}</small>
                    </div>

                    <div>
                        <a href="{{ route('eventos.edit', $evento->id) }}" 
                           class="btn btn-outline-secondary btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('eventos.destroy', $evento->id) }}" 
                              method="POST" 
                              style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar este evento?')">
                                Eliminar
                            </button>
                        </form>
                    </div>

                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
