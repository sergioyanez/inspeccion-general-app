<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_estado extends Model
{
    use HasFactory;
    protected $table = 'tipos_estados';

    public function detallesHabilitaciones(){
        return $this->hasMany('App\Models\Detalle_habilitacion');
    }
}
