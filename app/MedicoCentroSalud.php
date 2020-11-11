<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicoCentroSalud extends Model
{
    protected $table = 'medico_centros_salud';
    protected $primaryKey = 'idmedico_centros_salud';
    protected $fillable = [
        'idusuario',
        'idcentros_salud',
    ];

    public function centro_salud()
    {
        return $this->hasOne('App\CentroSalud', 'idcentros_salud', 'idcentros_salud');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'idusuario');
    }
}
