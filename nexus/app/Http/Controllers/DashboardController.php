<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Evento;
use App\Models\Foro;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Usuario autenticado
        $user = Auth::user();

        // Cantidad de eventos y foros creados por el usuario
        $eventosCreados = Evento::where('user_id', $user->id)->count();
        $forosCreados = Foro::where('user_id', $user->id)->count();

        // Últimos 5 eventos
        $ultimosEventos = Evento::where('user_id', $user->id)
                                ->orderBy('created_at', 'desc')
                                ->limit(5)
                                ->get();

        // Últimos 5 foros
        $ultimosForos = Foro::where('user_id', $user->id)
                            ->orderBy('created_at', 'desc')
                            ->limit(5)
                            ->get();

        return view('dashboard', compact(
            'user',
            'eventosCreados',
            'forosCreados',
            'ultimosEventos',
            'ultimosForos'
        ));
    }
}
