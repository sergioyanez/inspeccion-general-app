<?php

namespace Database\Seeders;

use App\Models\expedienteContribuyente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpedienteContribuyenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ec1 = new ExpedienteContribuyente();
        $ec1->expediente_id = 1;
        $ec1->contribuyente_id = 1;
        $ec1->save();

        $ec2 = new ExpedienteContribuyente();
        $ec2->expediente_id = 1;
        $ec2->contribuyente_id = 2;
        $ec2->save();

        $ec3 = new ExpedienteContribuyente();
        $ec3->expediente_id = 2;
        $ec3->contribuyente_id = 1;
        $ec3->save();

        $ec4 = new ExpedienteContribuyente();
        $ec4->expediente_id = 1;
        $ec4->contribuyente_id = 3;
        $ec4->save();
    }
}
