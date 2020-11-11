<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioProfesion extends Model
{
    protected $table = 'usuario_profesiones';
    protected $primaryKey = 'idusuario_profesiones';
    protected $fillable = [
        'idusuario',
        'idprofesiones',
    ];

    public function profesion()
    {
        return $this->hasOne('App\Profesion', 'idprofesiones', 'idprofesiones');
    }
}
