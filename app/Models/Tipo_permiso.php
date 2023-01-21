<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_permiso extends Model
{
    use HasFactory;
    protected $table = 'tipos_permisos';


    //Relacion uno a muchos
    public function usuarios(){
        return $this->hasMany('App\Models\User');
    }
}
