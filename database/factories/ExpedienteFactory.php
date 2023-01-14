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
        //    'id_inmueble_afectado'
        //    'id_estado_habilitacion'
            'fecha_habilitacion'=>$this->faker->date(),
        //    'baja');
        //    'id_estado_baja',
            'pdf_solicitud'=>$this->faker->url(),
        //    'id_catastro',
            'bienes_de_uso'=>$this->faker->paragraph(),
            'observaciones_grales'=>$this->faker->paragraph(),
            'pdf_certificado_habilitacion'=>$this->faker->url()
        ];
    }
}
