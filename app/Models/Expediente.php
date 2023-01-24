<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{

    use HasFactory;
    protected $table = 'expedientes';

    //Relacion muchos a muchos
    public function personas_juridicas(){
       return $this->belongsToMany('App\Models\Persona_juridica','expedientes_personas_juridicas');
   }
   //Relacion uno a uno
   public function estado_baja(){
    return $this->hasOne('App\Models\Estado_baja');
    }

    //Relacion uno a uno
   public function detalle_inmueble(){
    return $this->belongsTo('App\Models\Detalle_inmueble');
    }
//Relacion uno a uno
public function detalle_habilitacion(){
    return $this->belongsTo('App\Models\Detalle_habilitacion');
    }
     //Relacion muchos a muchos
     public function contribuyentes(){
        return $this->belongsToMany('App/Models/Contribuyente','expediente_contribuyente');
       }

}
