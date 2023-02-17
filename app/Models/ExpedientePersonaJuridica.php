<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpedientePersonaJuridica extends Model
{
    use HasFactory;
    protected $table = 'expedientes_personas_juridicas';

         //Relacion uno a muchos inversa. O relacion muchos a uno
         public function expediente(){
            return $this->belongsTo('App\Models\Expediente');
        }

             //Relacion uno a muchos inversa. O relacion muchos a uno
    public function personaJuridica(){
        return $this->belongsTo('App\Models\Persona_juridica');
    }
}
