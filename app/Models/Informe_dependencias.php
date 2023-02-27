<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe_dependencias extends Model
{
    use HasFactory;
    protected $table = 'informes_dependencias';


    //Relacion uno a muchos inversa. O relacion muchos a uno
    public function tipoDependencia(){
        return $this->belongsTo('App\Models\Tipo_dependencia');
    }

    //Relacion uno a muchos inversa
    public function expediente(){
        return $this->belongsTo('App\Models\Expediente');
    }

}
