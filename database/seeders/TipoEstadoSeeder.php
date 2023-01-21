<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEstadoSeeder extends Seeder
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
                'descripcion' => "En tramite",
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'descripcion' => "Habilitado",
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'descripcion' => "Vencida",
                'created_at'=>now(),
                'updated_at'=>now()
            ]

        ];
      DB::table('tipos_estados')->insert($data);
    }
}
