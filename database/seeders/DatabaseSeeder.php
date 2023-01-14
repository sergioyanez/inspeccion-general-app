<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contribuyente;
use App\Models\Expediente;
use App\Models\Persona_juridica;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoDniSeeder::class);
        $this->call(EstadoCivilSeeder::class);
        $this->call(EstadoHabilitacionSeeder::class);
        Persona_juridica::factory(5)->create();
        Contribuyente::factory(10)->create();
        Expediente::factory(5)->create();
    }
}
