<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_baja extends Model
{
    use HasFactory;
    protected $table = 'tipos_baja';

    //Relacion uno a muchos
    public function estadosDeBaja(){
        return $this->hasMany('App\Models\Estado_baja');
    }
}
