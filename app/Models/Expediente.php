<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $table = 'expedientes';

    public function contribuyentes(){
        return $this->belongsToMany('App\Models\Contribuyente');
    }
}
