<?php

namespace Database\Seeders;
use App\Models\Estado_habilitacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoHabilitacionSeeder extends Seeder
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
                'fecha_vencimiento'=>now()->addDays(30)
            ],
            [
                'descripcion' => "Permanente",
                'fecha_vencimiento'=>now()->now()->addDays(90)
            ],
            [
                'descripcion' => "Definitiva",
                'fecha_vencimiento'=>null
            ],
            [
                'descripcion' => "Especial",
                'fecha_vencimiento'=>now()->addYear()
            ],
            [
                'descripcion' => "Nocturna",
                'fecha_vencimiento'=>now()->addYear()
            ]

        ];
      DB::table('estados_habilitacion')->insert($data);
    }
}
