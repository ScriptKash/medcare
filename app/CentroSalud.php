<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroSalud extends Model
{
    protected $table = 'centros_salud';
    protected $primaryKey = 'idcentros_salud';
    protected $fillable = [
        'nombre',
        'direccion',
        'descripcion',
        'imagen',
        'telefono',
    ];

    public function medico_centro_salud()
    {
        return $this->belongsTo('App\MedioCentroSalud', 'idcentros_salud');
    }

    public function atencion_medica_centro_salud()
    {
        return $this->belongsTo('App\AtencionMedica', 'idcentro_salud');
    }
}
