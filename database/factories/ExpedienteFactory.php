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
            'nro_expediente'=>$this->faker->randomNumber(8),
            'nro_comercio'=>$this->faker->randomNumber(8),
            'actividad_ppal'=>$this->faker->sentence(),
            'anexo'=>$this->faker->sentence(),
            'persona_juridica_id'=>$this->faker->numberBetween(1,5),
        //    'id_inmueble_afectado'
            'estado_habilitacion_id'=>$this->faker->numberBetween(1,5),
            'fecha_habilitacion'=>$this->faker->date(),
        //    'baja');
            'estado_baja_id'=>$this->faker->numberBetween(1,10),
            'pdf_solicitud'=>$this->faker->url(),
        //    'id_catastro',
            'bienes_de_uso'=>$this->faker->paragraph(),
            'observaciones_grales'=>$this->faker->paragraph(),
            'pdf_certificado_habilitacion'=>$this->faker->url()
        ];
    }
}
