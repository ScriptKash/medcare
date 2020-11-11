<?php

namespace App\Http\Controllers;

use App\CentroSalud;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Session;
use Auth;

class CentroSaludController extends Controller
{
    public function getImage($filename)
    {
        $file = Storage::disk('centros-salud')->get($filename);
        return new Response($file, 200);
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->idroles === 3) {
            return view('centros-salud.create');

        } else {
            return redirect()->route('home');
        }
    }

    public function index()
    {
        $centro_salud = CentroSalud::all();

        return view('centros-salud.index', [
            'centro_salud' => $centro_salud,
        ]);
    }

    public function save(Request $request)
    {
        $imagen = $request->imagen;

        if ($imagen) {
            $imagen_name = 'centro-salud' . $request->name . '-' . time() . $imagen->getClientOriginalName();
            Storage::disk('centros-salud')->put($imagen_name, File::get($imagen));
        }

        CentroSalud::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'descripcion' => $request->descripcion,
            'telefono' => $request->telefono,
            'imagen' => $imagen_name,
        ]);

        Session::flash('message', 'Se ha creado el centro de salud exitosamente');

        return view('centros-salud.create');
    }

}
