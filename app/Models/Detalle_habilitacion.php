<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_habilitacion extends Model
{
    use HasFactory;
    protected $table = 'detalles_habilitaciones';

    //Relacion uno a muchos inversa. O relacion muchos a uno
    public function tipoHabilitacion(){
        return $this->belongsTo('App\Models\Tipo_habilitacion');
    }

     //Relacion uno a muchos inversa. O relacion muchos a uno
    public function tipoEstado(){
        return $this->belongsTo('App\Models\Tipo_estado');
    }

    public function expediente(){
        return $this->hasOne('App\Models\Expediente');
    }
}
