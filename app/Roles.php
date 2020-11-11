<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'idroles';
    protected $fillable = [
        'nombre'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'idroles', 'idroles');
    }
}
