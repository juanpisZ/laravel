@extends('layouts.appdashboard')

@section('title', 'Editar Evento')

@section('content')
<div class="container mt-4">
    <h2>Editar Evento</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('eventos.update', $evento->id) }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Imagen actual</label><br>
            @if($evento->imagen)
                <img src="{{ asset('storage/'.$evento->imagen) }}" width="180" class="rounded mb-2">
            @else
                <p>No hay imagen</p>
            @endif

            <input type="file" name="imagen" class="form-control mt-2">
        </div>

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ $evento->titulo }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ $evento->descripcion }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="datetime-local" name="fecha" class="form-control" value="{{ $evento->fecha }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" value="{{ $evento->ubicacion }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <input type="text" name="categoria" class="form-control" value="{{ $evento->categoria }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select name="estado" class="form-select">
                <option value="abierto"   {{ $evento->estado == 'abierto' ? 'selected' : '' }}>Abierto</option>
                <option value="cerrado"   {{ $evento->estado == 'cerrado' ? 'selected' : '' }}>Cerrado</option>
                <option value="cancelado" {{ $evento->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Capacidad</label>
            <input type="number" name="capacidad" class="form-control" value="{{ $evento->capacidad }}">
        </div>

        <button type="submit" class="btn btn-success">Actualizar Evento</button>
    </form>

</div>
@endsection
