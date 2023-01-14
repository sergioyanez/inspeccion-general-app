<?php

namespace Database\Seeders;

use App\Models\Tipo_dni;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoDniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoDni1 = new Tipo_dni();
        $tipoDni1->descripcion = "DNI A (original)";
        $tipoDni1->save();

        $tipoDni2 = new Tipo_dni();
        $tipoDni2->descripcion = "DNI B (duplicado)";
        $tipoDni2->save();


        $tipoDni3 = new Tipo_dni();
        $tipoDni3->descripcion = "DNI C (triplicado)";
        $tipoDni3->save();


        $tipoDni4 = new Tipo_dni();
        $tipoDni4->descripcion = "DNI D (cuadruplicado)";
        $tipoDni4->save();


        $tipoDni5 = new Tipo_dni();
        $tipoDni5->descripcion = "LC";
        $tipoDni5->save();


        $tipoDni6 = new Tipo_dni();
        $tipoDni6->descripcion = "LE";
        $tipoDni6->save();

    }
}
