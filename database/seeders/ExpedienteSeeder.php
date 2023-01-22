<?php

namespace Database\Seeders;

use App\Models\expediente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpedienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expediente1 = new expediente();
        $expediente1->catastro_id = 1;
        $expediente1-> nro_expediente = 456;
        $expediente1-> nro_comercio = 765;
        $expediente1-> actividad_ppal = "Almacen";
        $expediente1-> anexo = 1;
        $expediente1-> pdf_solicitud = "enlace1.com";
        $expediente1-> bienes_de_uso = "auto 150000, estanterias 50000";
        $expediente1-> observaciones_grales = "";
        $expediente1-> detalle_de_habilitacion_id = 1;
        $expediente1-> detalle_inmueble_id = 2;
        $expediente1->save();

        $expediente2 = new expediente();
        $expediente2->catastro_id = 2;
        $expediente2-> nro_expediente = 457;
        $expediente2-> nro_comercio = 765;
        $expediente2-> actividad_ppal = "Verduleria";
        $expediente2-> anexo = 1;
        $expediente2-> pdf_solicitud = "enlace1.com";
        $expediente2-> bienes_de_uso = "auto 150000, estanterias 50000";
        $expediente2-> observaciones_grales = "";
        $expediente2-> detalle_de_habilitacion_id = 2;
        $expediente2-> detalle_inmueble_id = 4;
        $expediente2->save();

       
    }
}
