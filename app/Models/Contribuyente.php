<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribuyente extends Model
{
    use HasFactory;
    protected $table = 'contribuyentes';

    //Relacion uno a muchos inversa. O relacion muchos a uno
    public function tipoDni(){
        return $this->belongsTo('App\Models\Tipo_dni','tipo_dni_id');
    }

     //Relacion uno a muchos inversa. O relacion muchos a uno
    public function estadoCivil(){
        return $this->belongsTo('App\Models\Estado_civil','estado_civil_id');
    }
    //Relacion muchos a muchos
    public function expedientes(){
        return $this->belongsToMany('App/Models/Expediente','expediente_contribuyente','contribuyente_id','expediente_id');
       }

}
