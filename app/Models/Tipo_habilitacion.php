<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_habilitacion extends Model
{
    use HasFactory;
    protected $table = 'tipos_habilitaciones';

    //Relacion uno a muchos

    public function detallesHabilitaciones(){
        return $this->hasMany('App\Models\Detalle_habilitacion');
    }
}
