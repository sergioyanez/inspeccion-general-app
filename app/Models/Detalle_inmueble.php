<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_inmueble extends Model
{
    use HasFactory;
    protected $table = 'detalles_inmuebles';

    //Relacion uno a muchos inversa. O relacion muchos a uno

    public function inmueble(){
        return $this->belongsTo('App\Models\Inmueble');
    }

    public function tipoInmueble(){
        return $this->belongsTo('App\Models\Tipo_inmueble');
    }

    public function expediente(){
        return $this->hasOne('App\Models\Expediente');
    }
}
