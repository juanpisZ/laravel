<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Foro;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
    {
         $user = User::first();


         //Contadores para el 
         
        // Eventos creados
         $eventosCreados = Event::where('user_id', $user->id)->count();


        // Foros creados
         $forosCreados = Foro::where('user_id', $user->id)->count();


        return view('dashboard.index', compact(
            'user',
            'eventosCreados',
            'forosCreados'
        ));
    }
}
