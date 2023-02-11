<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpedienteContribuyente extends Model
{
    use HasFactory;

    protected $table = 'expediente_contribuyente';

      //Relacion uno a muchos inversa. O relacion muchos a uno
      public function expediente(){
        return $this->belongsTo('App\Models\Expediente');
    }

     //Relacion uno a muchos inversa. O relacion muchos a uno
    public function contribuyente(){
        return $this->belongsTo('App\Models\Contribuyente');
    }
}
