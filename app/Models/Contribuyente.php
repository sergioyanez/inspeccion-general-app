<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribuyente extends Model
{
    use HasFactory;
    protected $table = 'contribuyentes';

    //Relacion muchos a uno
    public function tipoDni(){
        return $this->belongsTo('App\Models\Tipo_dni');
    }

    //Relacion muchos a uno
    public function estadoCivil(){
        return $this->belongsTo('App\Models\Estado_civil');
    }

}
