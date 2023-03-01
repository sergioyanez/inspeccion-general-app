<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{

    use HasFactory;
    protected $table = 'expedientes';



   //Relacion uno a uno
   public function catastro(){
    return $this->belongsTo('App\Models\Catastro');
    }
   //Relacion uno a uno
   public function estadoBaja(){
    return $this->belongsTo('App\Models\Estado_baja');
    }

    //Relacion uno a uno
   public function detalleInmueble(){
    return $this->belongsTo('App\Models\Detalle_inmueble');
    }
//Relacion uno a uno
public function detalleHabilitacion(){
    return $this->belongsTo('App\Models\Detalle_habilitacion');
    }

     //Relacion muchos a muchos
     public function contribuyentes(){
        return $this->belongsToMany('App\Models\Contribuyente','expediente_contribuyente','expediente_id','contribuyente_id');
       }

        //Relacion muchos a muchos
    public function personasJuridicas(){
        return $this->belongsToMany('App\Models\Persona_juridica','expedientes_personas_juridicas','expediente_id','persona_juridica_id');
    }

    //Relacion uno a muchos un expediente tiene muchos expedientesContribuyentes.
    public function expedientesContribuyentes(){
        return $this->hasMany('App\Models\ExpedienteContribuyente');
    }

    //Relacion uno a muchos un expediente tiene muchos expedientesContribuyentes.
    public function expedientesPersonasJuridicas(){
        return $this->hasMany('App\Models\ExpedientePersonaJuridica');
    }

    //Relacion uno a muchos un expediente tiene muchos expedientesContribuyentes.
    public function informesDependencias(){
        return $this->hasMany('App\Models\Informe_dependencias');
    }

}
