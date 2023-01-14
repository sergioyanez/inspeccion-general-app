<?php

namespace Database\Seeders;
use App\Models\Estado_habilitacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoHabilitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadohab1 = new Estado_habilitacion();
        $estadohab1->descripcion = "Provisoria";
    //    $estadohab1->fecha_vencimiento->date();
        $estadohab1->save();

        $estadohab2 = new Estado_habilitacion();
        $estadohab2->descripcion = "Permanente";
    //    $estadohab2->fecha_vencimiento->date();
        $estadohab2->save();

        $estadohab3 = new Estado_habilitacion();
        $estadohab3->descripcion = "Definitiva";
    //    $estadohab3->fecha_vencimiento->date();
        $estadohab3->save();

        $estadohab4 = new Estado_habilitacion();
        $estadohab4->descripcion = "Nocturna";
    //    $estadohab4->fecha_vencimiento->date();
        $estadohab4->save();

        $estadohab5 = new Estado_habilitacion();
        $estadohab5->descripcion = "Especial";
    //    $estadohab5->fecha_vencimiento->date();
        $estadohab5->save();
    }
}
