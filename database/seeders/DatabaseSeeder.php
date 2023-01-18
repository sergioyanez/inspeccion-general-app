<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Contribuyente;
use App\Models\Estado_baja;
use App\Models\Estado_civil;
use App\Models\Expediente;
use App\Models\Inmueble;
use App\Models\Catastro;
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
        $this->call(TipoHabilitacionSeeder::class);
        $this->call(TipoEstadoSeeder::class);
        $this->call(EstadoCivilSeeder::class);
        $this->call(TipoDniSeeder::class);
        $this->call(TipoDependenciaSeeder::class);
        $this->call(TipoInmuebleSeeder::class);
        $this->call(TipoBajaSeeder::class);
        $this->call(TipoPermisoSeeder::class);
        Inmueble::factory(10)->create();
        Catastro::factory(10)->create();
        Persona_juridica::factory(10)->create();
        // Contribuyente::factory(10)->create();
        // Expediente::factory(5)->create();
    }
}
