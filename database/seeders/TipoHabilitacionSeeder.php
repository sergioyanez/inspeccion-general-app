<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TipoHabilitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'descripcion' => "Provisoria",
                'plazo_vencimiento'=>30,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'descripcion' => "Permanente",
                'plazo_vencimiento'=>90,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'descripcion' => "Definitiva",
                'plazo_vencimiento'=>null,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'descripcion' => "Especial",
                'plazo_vencimiento'=>365,'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'descripcion' => "Nocturna",
                'plazo_vencimiento'=>365,
                'created_at'=>now(),
                'updated_at'=>now()
            ]

        ];
      DB::table('tipos_habilitaciones')->insert($data);
    }

}
