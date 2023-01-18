<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipo_inmueble;

class TipoInmuebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inmueble1 = new Tipo_inmueble();
        $inmueble1->descripcion = "Alquilado";
        $inmueble1->save();

        $inmueble2 = new Tipo_inmueble();
        $inmueble2->descripcion = "Propio";
        $inmueble2->save();


        $inmueble3 = new Tipo_inmueble();
        $inmueble3->descripcion = "Otro";
        $inmueble3->save();
    }
}
