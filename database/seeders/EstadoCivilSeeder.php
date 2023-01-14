<?php

namespace Database\Seeders;

use App\Models\Estado_civil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadoCivil1 = new Estado_civil();
        $estadoCivil1->descripcion = "S (soltero/a)";
        $estadoCivil1->save();

        $estadoCivil1 = new Estado_civil();
        $estadoCivil1->descripcion = "C (casado/a)";
        $estadoCivil1->save();

        $estadoCivil1 = new Estado_civil();
        $estadoCivil1->descripcion = "V (viudo/a)";
        $estadoCivil1->save();

        $estadoCivil1 = new Estado_civil();
        $estadoCivil1->descripcion = "D (divorciado/a)";
        $estadoCivil1->save();
    }
}
