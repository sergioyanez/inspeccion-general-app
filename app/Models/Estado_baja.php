<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_baja extends Model
{
    use HasFactory;
    protected $table = 'estados_baja';

    //Relacion muchos a uno
    public function tipoBaja(){
        return $this->belongsTo('App\Models\Tipo_baja');
    }

    public function expedientes(){
        return $this->hasMany('App\Models\Expediente');
    }
}
