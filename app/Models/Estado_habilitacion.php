<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_habilitacion extends Model
{
    use HasFactory;
    protected $table = 'estados_habilitacion';

    public function expedientes(){
        return $this->hasMany('App\Models\Expediente');
    }
}
