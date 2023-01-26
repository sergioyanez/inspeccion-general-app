<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona_juridica extends Model
{
    use HasFactory;
    protected $table = 'personas_juridicas';

    //Relacion muchos a muchos
   public function expedientes(){
       return $this->belongsToMany('App\Models\Expediente','expedientes_personas_juridicas','persona_juridica_id','expediente_id');
   }
}
