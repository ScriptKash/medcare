<?php

namespace App\Http\Controllers;

use App\AtencionMedica;
use App\CentroSalud;
use App\MedicoCentroSalud;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Session;

class AtencionMedicaController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $atencion_medica = "";
            if (Auth::user()->idroles == 1) {
                $atencion_medica = AtencionMedica::where('idusuario', Auth::user()->id)->get();
            }

            if (Auth::user()->idroles == 2) {
                $atencion_medica = AtencionMedica::where('idmedico', Auth::user()->id)->get();
            }

            if (Auth::user()->idroles == 3) {
                $atencion_medica = AtencionMedica::all();
            }

            return view('atencion-medica.index', [
                'atencion_medica' => $atencion_medica,
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    public function atencionMedico($id)
    {
        $usuario = User::find($id);
        $centro_salud = MedicoCentroSalud::where('idusuario', $id)->get();

        return view('atencion-medica.medico', [
            'usuario' => $usuario,
            'centro_salud' => $centro_salud,
        ]);
    }

    public function saveMedico(Request $request)
    {
        AtencionMedica::create([
            'idusuario' => $request->id,
            'idmedico' => $request->idmedico,
            'fecha_atencion' => null,
            'idcentro_salud' => $request->idcentro_salud,
            'mensaje' => $request->mensaje,
            'confirmado' => 0,
            'precio' => null,
        ]);

        Session::flash('message', 'Se ha enviado tu solicitud de atención médica con éxito');

        return redirect()->route('atencion.medico', ['id' => $request->idmedico]);
    }

    public function atencionCentroSalud($id)
    {
        $centro_salud = CentroSalud::find($id);
        $medico = MedicoCentroSalud::where('idcentros_salud', $id)->get();

        return view('atencion-medica.centro-salud', [
            'centro_salud' => $centro_salud,
            'medico' => $medico,
        ]);
    }

    public function saveCentroSalud(Request $request)
    {
        AtencionMedica::create([
            'idusuario' => $request->id,
            'idmedico' => $request->idmedico,
            'fecha_atencion' => null,
            'idcentro_salud' => $request->idcentro_salud,
            'mensaje' => $request->mensaje,
            'confirmado' => 0,
            'precio' => null,
        ]);

        Session::flash('message', 'Se ha enviado tu solicitud de atención médica con éxito');

        return redirect()->route('atencion.centro-salud', ['id' => $request->idcentro_salud]);
    }

    public function edit($id)
    {
        $atencion_medica = AtencionMedica::find($id);

        return view('atencion-medica.edit', [
            'atencion_medica' => $atencion_medica,
        ]);
    }

    public function update(Request $request)
    {

        if (Auth::user()->idroles == 2 || Auth::user()->idroles == 3) {
            AtencionMedica::where('idatencion_medica', $request->id)
            ->update(['fecha_atencion' => $request->fecha_atencion,
                'hora_atencion' => $request->hora_atencion,
                'precio' => $request->precio]);
        }else {
            AtencionMedica::where('idatencion_medica', $request->id)
            ->update(['confirmado' => 1]);
        }
        
        Session::flash('message', 'Se ha actualizado la atención médica con éxito');

        return redirect()->route('atencion.edit', ['id' => $request->id]);
    }
}
