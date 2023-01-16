<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $table = 'expedientes';

    public function contribuyentes(){
        return $this->belongsToMany('App\Models\Contribuyente');
    }
    //Relacion uno a muchos
    public function estadoHabilitacion(){
        return $this->belongsTo('App\Models\Estado_habilitacion');
    }

    //Relacion uno a muchos
    public function estadoBaja(){
        return $this->belongsTo('App\Models\Estado_baja');
    }

    //Relacion muchos a uno
    public function personaJuridica(){
        return $this->belongsTo('App\Models\Persona_juridica');
    }
}
