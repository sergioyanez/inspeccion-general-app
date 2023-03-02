<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_dependencia extends Model
{
    use HasFactory;
    protected $table='tipos_dependencias';

    //Relacion uno a muchos un expediente tiene muchos expedientesContribuyentes.
    public function informesDependencias(){
        return $this->hasMany('App\Models\Informes_dependencias');
    }
}
