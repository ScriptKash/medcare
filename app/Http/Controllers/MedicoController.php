<?php

namespace App\Http\Controllers;

use App\CentroSalud;
use App\MedicoCentroSalud;
use App\Profesion;
use App\User;
use App\UsuarioProfesion;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;

class MedicoController extends Controller
{
    public function index()
    {
        $medico = User::where('idroles', 2)->get();
        $usuario_profesion = UsuarioProfesion::all();
        $medico_centro_salud = MedicoCentroSalud::all();

        return view('medicos.index', [
            'medico' => $medico,
            'usuario_profesion' => $usuario_profesion,
            'medico_centro_salud' => $medico_centro_salud,
        ]);
    }

    public function create()
    {
        $usuario = User::all();
        $profesion = Profesion::all();
        $centro_salud = CentroSalud::all();

        if (Auth::check() && Auth::user()->idroles === 3) {
            return view('medicos.create', [
                'usuario' => $usuario,
                'profesion' => $profesion,
                'centro_salud' => $centro_salud,
            ]);

        } else {
            return redirect()->route('home');
        }
    }

    public function save(Request $request)
    {
        User::where('id', $request->idusuario)->update(['idroles' => 2]);

        UsuarioProfesion::create([
            'idusuario' => $request->idusuario,
            'idprofesiones' => $request->idprofesiones,
        ]);

        MedicoCentroSalud::create([
            'idusuario' => $request->idusuario,
            'idcentros_salud' => $request->idcentros_salud,
        ]);

        Session::flash('message', 'Se ha creado el médico exitosamente');

        return redirect()->route('medico.create');
    }

    public function getImage($filename)
    {
        $file = Storage::disk('usuarios')->get($filename);
        return new Response($file, 200);
    }

}
