<?php

namespace Database\Seeders;

use App\Models\Domicilio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DomicilioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domicilio = new Domicilio();
        $domicilio->calle='Alberti';
        $domicilio->numero=560;
        $domicilio->save();

        $domicilio2 = new Domicilio();
        $domicilio2->calle='Alberti';
        $domicilio2->numero=560;
        $domicilio2->save();

        $domicilio3 = new Domicilio();
        $domicilio3->calle='Alberti';
        $domicilio3->numero=560;
        $domicilio3->save();
    }
}
