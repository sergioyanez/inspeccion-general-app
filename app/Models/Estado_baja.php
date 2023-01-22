<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_baja extends Model
{
    use HasFactory;
    protected $table = 'estados_bajas';

    //Relacion uno a muchos inversa. O relacion muchos a uno

    public function tipoBaja(){
        return $this->belongsTo('App\Models\Tipo_baja');
    }
    //Relacion muchos a uno

    public function Expediente(){
        return $this->belongsTo('App\Models\expediente');
    }

    
}
