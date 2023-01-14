<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona_juridica extends Model
{
    use HasFactory;
    protected $table = 'personas_juridicas';

     //Relacion uno a muchos
     public function expedientes(){
        return $this->hasMany('App\Models\Expediente');
    }
}
