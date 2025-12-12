<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class EventoController extends Controller
{
    // LISTAR EVENTOS 
    public function index()
    {
        $eventos = Evento::orderBy('fecha', 'asc')->get();
        return view('events.index', compact('eventos'));
    }

    // BUSCAR EVENTOS
    public function buscar(Request $request)
    {
        $q = $request->input('q');

        $eventos = Evento::query()
            ->where('titulo', 'LIKE', "%$q%")
            ->orWhere('descripcion', 'LIKE', "%$q%")
            ->orderBy('fecha', 'asc')
            ->get();

        return view('events.buscar', compact('eventos'));
    }


    // LISTAR MIS EVENTOS
    public function misEventos()
    {
        $eventos = Evento::where('user_id', auth()->id())->get();

        return view('events.misEventos', compact('eventos'));
    }


    // FORMULARIO DE CREACIÓN
    public function create()
    {
        return view('events.createEvento');
    }

    // GUARDAR EVENTO NUEVO
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'fecha' => 'required|date',
            'descripcion' => 'nullable',
            'ubicacion' => 'nullable',
            'categoria' => 'nullable',
            'estado' => 'nullable',
            'capacidad' => 'nullable|integer',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $rutaImagen = null;

        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('eventos', 'public');
        }

        Evento::create([
            'user_id' => Auth::id(),
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'ubicacion' => $request->ubicacion,
            'categoria' => $request->categoria,
            'estado' => $request->estado,
            'capacidad' => $request->capacidad,
            'imagen' => $rutaImagen
        ]);

        return redirect()->route('eventos.index')->with('success', 'Evento creado correctamente.');
    }

    // FORMULARIO PARA EDITAR 
    public function edit($id)
    {
        $evento = Evento::findOrFail($id);

        if ($evento->user_id != Auth::id()) {
            abort(403, 'No tienes permiso para editar este evento.');
        }

        return view('events.edit', compact('evento'));
    }

    // ACTUALIZAR EVENTO
    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);

        if ($evento->user_id != Auth::id()) {
            abort(403, 'No tienes permiso para editar este evento.');
        }

        $request->validate([
            'titulo' => 'required',
            'fecha' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // Guardar nueva imagen si existe
        if ($request->hasFile('imagen')) {

            if ($evento->imagen && Storage::disk('public')->exists($evento->imagen)) {
                Storage::disk('public')->delete($evento->imagen);
            }

            $evento->imagen = $request->file('imagen')->store('eventos', 'public');
        }

        // Actualizar datos restantes
        $evento->titulo = $request->titulo;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $request->fecha;
        $evento->ubicacion = $request->ubicacion;
        $evento->categoria = $request->categoria;
        $evento->estado = $request->estado;
        $evento->capacidad = $request->capacidad;

        $evento->save();

        return redirect()->route('eventos.index')->with('success', 'Evento actualizado correctamente.');
    }

    // BORRAR EVENTO
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);

        if ($evento->user_id != Auth::id() && Auth::user()->role != 'admin') {
            abort(403, 'No tienes permiso para eliminar este evento.');
        }

        if ($evento->imagen && Storage::disk('public')->exists($evento->imagen)) {
            Storage::disk('public')->delete($evento->imagen);
        }

        $evento->delete();

        return redirect()->route('eventos.index')->with('success', 'Evento eliminado.');
    }


    // VER DETALLES DE UN EVENTO
    public function show($id)
    {
      $evento = Evento::findOrFail($id);

        $yaParticipa = $evento->participantes()
                         ->where('user_id', auth()->id())
                         ->exists();

        return view('events.show', compact('evento', 'yaParticipa'));
    }

    public function inscritos()
    {
        $user = Auth::user();

        
        $eventos = $user->eventosInscritos()->paginate(10);

        return view('events.inscritos', compact('eventos'));
    }




     public function participar($id)
    {
        $evento = Evento::findOrFail($id);

        
        $evento->participantes()->syncWithoutDetaching([auth()->id()]);

        return redirect()->back()->with('success', 'Te has unido al evento');
    }


    public function desinscribir(Evento $evento)
    {
        $evento->participantes()->detach(Auth::id());

        return back()->with('success', 'Has cancelado tu inscripción.');
    }









}
