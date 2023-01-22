<?php

namespace Database\Seeders;

use App\Models\informe_dependencias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformeDependenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $informeDependencia1 = new informe_dependencias();
        $informeDependencia1->tipo_dependencia_id = 1;
        $informeDependencia1->pdf_informe = "enlace1.html";
        $informeDependencia1->fecha_informe = "1989-03-26";
        $informeDependencia1->observaciones = "el informe de la dependencia dice que...";
        $informeDependencia1->save();

        $informeDependencia2 = new informe_dependencias();
        $informeDependencia2->tipo_dependencia_id = 2;
        $informeDependencia2->pdf_informe = "enlace2.html";
        $informeDependencia2->fecha_informe = "2022-03-26";
        $informeDependencia2->observaciones = "el informe de la dependencia dice que...";
        $informeDependencia2->save();

        $informeDependencia3 = new informe_dependencias();
        $informeDependencia3->tipo_dependencia_id = 2;
        $informeDependencia3->pdf_informe = "enlace3.html";
        $informeDependencia3->fecha_informe = "2020-03-26";
        $informeDependencia3->observaciones = "el informe de la dependencia dice que...";
        $informeDependencia3->save();

        $informeDependencia4 = new informe_dependencias();
        $informeDependencia4->tipo_dependencia_id = 3;
        $informeDependencia4->pdf_informe = "enlace3.html";
        $informeDependencia4->fecha_informe = "2019-03-26";
        $informeDependencia4->observaciones = "el informe de la dependencia dice que...";
        $informeDependencia4->save();
       
    }
}
