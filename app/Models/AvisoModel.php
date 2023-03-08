<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvisoModel extends Model
{
    use HasFactory;

    protected $table = 'aviso';

    public function usuario()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function expediente()
    {
        return $this->belongsTo('App\Models\Expediente');
    }
}
