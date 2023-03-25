<?php

namespace Database\Seeders;

use App\Models\Tipo_baja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoBajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $baja1 = new Tipo_baja();
        $baja1->descripcion = "Provisoria";
        $baja1->save();

        $baja2 = new Tipo_baja();
        $baja2->descripcion = "Permanente";
        $baja2->save();

        $baja3 = new Tipo_baja();
        $baja3->descripcion = "De oficio";
        $baja3->save();
    }
}
