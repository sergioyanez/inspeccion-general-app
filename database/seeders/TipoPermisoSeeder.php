<?php

namespace Database\Seeders;

use App\Models\Tipo_permiso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permiso1 = new Tipo_permiso();
        $permiso1->tipo = "Administrador";
        $permiso1->save();

        $permiso2 = new Tipo_permiso();
        $permiso2->tipo = "Operador";
        $permiso2->save();
    }
}
