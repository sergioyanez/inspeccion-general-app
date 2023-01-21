<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_inmueble extends Model
{
    use HasFactory;
    protected $table = 'tipos_inmuebles';

    //Relacion uno a muchos

    public function detallesInmuebles(){
        return $this->hasMany('App\Models\Detalle_inmueble');
    }
}
