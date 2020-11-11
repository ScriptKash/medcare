<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CentroSalud;
use App\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $medico = User::where('idroles', 2)->take(3)->get();
        $centro_salud = CentroSalud::take(3)->get();

        return view('welcome', [
            'medico' => $medico,
            'centro_salud' => $centro_salud,
        ]);
    }
}
