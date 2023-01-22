<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expediente>
 */
class ExpedienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'catastro_id' =>$this->faker-> numberBetween(1,10),
            'nro_expediente'=>$this->faker->randomNumber(8),
            'nro_comercio'=>$this->faker->randomNumber(8),
            'actividad_ppal'=>$this->faker->sentence(),
            'anexo'=>$this->faker->sentence(),
            'pdf_solicitud'=>$this->faker->url(),
            'bienes_de_uso'=>$this->faker->paragraph(),
            'observaciones_grales'=>$this->faker->paragraph(),
            'detalle_de_habilitacion_id'=>$this->faker-> numberBetween(1,10),
            'detalle_inmueble_id'=>$this->faker-> numberBetween(1,10)
           
        ];
    }
}
