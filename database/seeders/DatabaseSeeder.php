<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contribuyente;
use App\Models\Estado_baja;
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
        $this->call(TipoBajaSeeder::class);
        Persona_juridica::factory(5)->create();
        Estado_baja::factory(10)->create();
        Contribuyente::factory(10)->create();
        Expediente::factory(5)->create();
    }
}
