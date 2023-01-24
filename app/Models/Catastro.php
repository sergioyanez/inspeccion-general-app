<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catastro extends Model
{
    use HasFactory;
    protected $table ='catastros';

    public function expediente(){
        return $this->hasOne('App\Models\Expediente');
    }
}
