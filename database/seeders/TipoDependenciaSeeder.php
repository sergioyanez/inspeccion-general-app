<?php

namespace Database\Seeders;

use App\Models\Tipo_dependencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoDependenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoDependencia1 = new Tipo_dependencia();
        $tipoDependencia1 ->nombre = "Secretaria de Gobierno";
        $tipoDependencia1 ->save();

        $tipoDependencia2 = new Tipo_dependencia();
        $tipoDependencia2 ->nombre = "Catastro";
        $tipoDependencia2 ->save();

        $tipoDependencia3 = new Tipo_dependencia();
        $tipoDependencia3 ->nombre = "Obras Particulares";
        $tipoDependencia3 ->save();

        $tipoDependencia4 = new Tipo_dependencia();
        $tipoDependencia4 ->nombre = "Tasa por Alumbrado, barrido y limpieza. Tasa porconservación de la red vial";
        $tipoDependencia4 ->save();

        $tipoDependencia5 = new Tipo_dependencia();
        $tipoDependencia5->nombre = "Bromatología";
        $tipoDependencia5 ->save();

        $tipoDependencia6 = new Tipo_dependencia();
        $tipoDependencia6 ->nombre = "Tasa por inspección de seguridad e higiene/Habilitacion comercial";
        $tipoDependencia6 ->save();

        $tipoDependencia7 = new Tipo_dependencia();
        $tipoDependencia7 ->nombre = "Juzgado de faltas";
        $tipoDependencia7 ->save();

        $tipoDependencia8 = new Tipo_dependencia();
        $tipoDependencia8 ->nombre = "Bomberos de policía de Buenos Aires";
        $tipoDependencia8 ->save();

        $tipoDependencia9 = new Tipo_dependencia();
        $tipoDependencia9 ->nombre = "Inspección General";
        $tipoDependencia9 ->save();

        $tipoDependencia10 = new Tipo_dependencia();
        $tipoDependencia10 ->nombre = "Registro de deudores alimentarios morosos";
        $tipoDependencia10 ->save();
    }
}
