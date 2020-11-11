<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    protected $table = 'profesiones';
    protected $primaryKey = 'idprofesiones';
    protected $fillable = [
        'nombre',
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function usuario_profesion()
    {
        return $this->belongsTo('App\UsuarioProfesion', 'idprofesiones');
    }
}
