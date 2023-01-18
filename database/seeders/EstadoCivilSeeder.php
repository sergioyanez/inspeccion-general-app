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
        $estadoCivil1->descripcion = "Soltero/a";
        $estadoCivil1->save();

        $estadoCivil2 = new Estado_civil();
        $estadoCivil2->descripcion = "Casado/a";
        $estadoCivil2->save();

        $estadoCivil3 = new Estado_civil();
        $estadoCivil3->descripcion = "Viudo/a";
        $estadoCivil3->save();

        $estadoCivil4 = new Estado_civil();
        $estadoCivil4->descripcion = "Divorciado/a";
        $estadoCivil4->save();

        $estadoCivil5 = new Estado_civil();
        $estadoCivil5->descripcion = "Separado/a ";
        $estadoCivil5->save();
    }

}
