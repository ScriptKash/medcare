<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtencionMedica extends Model
{
    protected $table = 'atencion_medica';
    protected $primaryKey = 'idatencion_medica';
    protected $fillable = [
        'idusuario',
        'idmedico',
        'fecha_atencion',
        'hora_atencion',
        'idcentro_salud',
        'mensaje',
        'precio',
        'confirmado',
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'idusuario');
    }

    public function medico()
    {
        return $this->hasOne('App\User', 'id', 'idmedico');
    }

    public function centro_salud()
    {
        return $this->hasOne('App\CentroSalud', 'idcentros_salud', 'idcentro_salud');
    }


}
