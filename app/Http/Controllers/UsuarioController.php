<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SweetAlertController;
use App\Roles;
use App\User;
use App\AtencionMedica;
use App\UsuarioProfesion;
use App\MedicoCentroSalud;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = User::all();

        return view('user.index', compact('usuario'));
    }

    public function config()
    {
        return view('user.config');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $usuario = User::find($id);
        $atencion_medica = AtencionMedica::where(['idusuario' => $id, 'confirmado' => 1])->get();

        return view('user.profile', [
            'usuario' => $usuario,
            'atencion_medica' => $atencion_medica,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);

        return view('user.edit', [
            'usuario' => $usuario,
        ]);
    }

    public function updateEdit(Request $request)
    {
        // Obtener el usuario identificado
        $user = User::find($request->id);

        // Asignar nuevos valores al objeto del usuario
        $user->name = $request->name;
        $user->surname1 = $request->surname1;
        $user->surname2 = $request->surname2;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->IdRoles = $request->roles;

        // Ejecutar consulta y cambios en la BD
        $user->update();

        SweetAlertController::update('Usuario');

        return redirect()->route('user.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Obtener el usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        // Asignar nuevos valores al objeto del usuario
        $user->name = $request->name;
        $user->surname1 = $request->surname1;
        $user->surname2 = $request->surname2;
        $user->username = $request->username;
        $user->email = $request->email;

        // Subir la imagen
        $avatar = $request->file('avatar');
        if ($avatar) {

            // Poner nombre único
            $avatar_name = 'usuario' . $request->username . '-' . time() . $avatar->getClientOriginalName();

            // Guardarla en la carpeta storage (storage/app/users)
            Storage::disk('avatar')->put($avatar_name, File::get($avatar));

            // Seteo el nombre de la imagen en el objeto
            $user->avatar = $avatar_name;
        }

        // Ejecutar consulta y cambios en la BD
        $user->update();

        return redirect()->route('user.config');
    }

    public function eliminarMedico(Request $request) {
        User::where('id', $request->id)->update(['idroles' => 1]);
        UsuarioProfesion::where('idusuario', $request->id)->delete();
        MedicoCentroSalud::where('idusuario', $request->id)->delete();
        return redirect()->route('user.profile', ['id' => $request->id]);
    }

    public function getImage($filename)
    {
        $file = Storage::disk('usuarios')->get($filename);
        return new Response($file, 200);
    }

}
