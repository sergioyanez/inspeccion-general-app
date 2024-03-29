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
        $expediente1-> detalle_habilitacion_id = 1;
        $expediente1-> detalle_inmueble_id = 1;
        $expediente1->estado_baja_id = 1;
        $expediente1->save();

        $expediente2 = new expediente();
        $expediente2->catastro_id = 2;
        $expediente2-> nro_expediente = 457;
        $expediente2-> nro_comercio = 766;
        $expediente2-> actividad_ppal = "Verduleria";
        $expediente2-> anexo = 1;
        $expediente2-> pdf_solicitud = "enlace1.com";
        $expediente2-> bienes_de_uso = "auto 150000, estanterias 50000";
        $expediente2-> observaciones_grales = "";
        $expediente2-> detalle_habilitacion_id = 2;
        $expediente2-> detalle_inmueble_id = 2;
        $expediente2->estado_baja_id = 2;
        $expediente2->save();

        $expediente3 = new expediente();
        $expediente3->catastro_id = 3;
        $expediente3-> nro_expediente = 458;
        $expediente3-> nro_comercio = 767;
        $expediente3-> actividad_ppal = "Verduleria";
        $expediente3-> anexo = 1;
        $expediente3-> pdf_solicitud = "enlace1.com";
        $expediente3-> bienes_de_uso = "auto 150000, estanterias 50000";
        $expediente3-> observaciones_grales = "";
        $expediente3-> detalle_habilitacion_id = 3;
        $expediente3-> detalle_inmueble_id = 3;
        $expediente3->estado_baja_id = 3;
        $expediente3->save();

        $expediente4 = new expediente();
        $expediente4->catastro_id = 4;
        $expediente4-> nro_expediente = 459;
        $expediente4-> nro_comercio = 768;
        $expediente4-> actividad_ppal = "Almacen";
        $expediente4-> anexo = 1;
        $expediente4-> pdf_solicitud = "enlace1.com";
        $expediente4-> bienes_de_uso = "auto 150000, estanterias 50000";
        $expediente4-> observaciones_grales = "";
        $expediente4-> detalle_habilitacion_id = 4;
        $expediente4-> detalle_inmueble_id = 4;
        $expediente4->estado_baja_id = 4;
        $expediente4->save();

        $expediente5 = new expediente();
        $expediente5->catastro_id = 5;
        $expediente5-> nro_expediente = 460;
        $expediente5-> nro_comercio = 769;
        $expediente5-> actividad_ppal = "Maxi Kiosco";
        $expediente5-> anexo = 1;
        $expediente5-> pdf_solicitud = "enlace1.com";
        $expediente5-> bienes_de_uso = "auto 150000, estanterias 50000";
        $expediente5-> observaciones_grales = "";
        $expediente5-> detalle_habilitacion_id = 5;
        $expediente5-> detalle_inmueble_id = 5;
        $expediente5->estado_baja_id = 5;
        $expediente5->save();


    }
}
