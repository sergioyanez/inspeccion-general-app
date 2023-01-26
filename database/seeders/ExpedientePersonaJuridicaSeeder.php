<?php

namespace Database\Seeders;

use App\Models\expediente_persona_juridica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpedientePersonaJuridicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $epj1 = new expediente_persona_juridica();
        $epj1->expediente_id = 1;
        $epj1->persona_juridica_id = 1;
        $epj1->save();

        $epj2 = new expediente_persona_juridica();
        $epj2->expediente_id = 2;
        $epj2->persona_juridica_id = 2;
        $epj2->save();

        $epj3 = new expediente_persona_juridica();
        $epj3->expediente_id = 1;
        $epj3->persona_juridica_id = 2;
        $epj3->save();

        $epj4 = new expediente_persona_juridica();
        $epj4->expediente_id = 3;
        $epj4->persona_juridica_id = 1;
        $epj4->save();


    }
}
