<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detalle_habilitacion>
 */
class Detalle_habilitacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tipo_habilitacion_id'=>$this->faker->numberBetween(1,5),
            'tipo_estado_id'=>$this->faker->numberBetween(1,3),
            'fecha_vencimiento'=>$this->faker->date(),
            'fecha_primer_habilitacion'=>$this->faker->date(),
            'pdf_certificado_habilitacion'=>$this->faker->filePath(),
        ];
    }
}
