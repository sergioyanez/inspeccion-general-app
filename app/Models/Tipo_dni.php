<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_dni extends Model
{
    use HasFactory;
    protected $table = 'tipos_dni';


     //Relacion uno a muchos
    public function contribuyentes(){
        return $this->hasMany('App\Models\Contribuyente','tipo_dni_id');
    }
}
