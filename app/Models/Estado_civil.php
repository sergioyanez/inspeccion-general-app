<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_civil extends Model
{

    use HasFactory;
    protected $table = 'estados_civiles';


    //Relacion uno a muchos
    public function contribuyentes(){
        return $this->hasMany('App\Models\Contribuyente');
    }
}
