<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estado_baja>
 */
class Estado_bajaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tipo_baja_id'=>$this->faker->numberBetween(1,2),
            'deuda'=>$this->faker->randomFloat(2,10000,1000000),
            'fecha_baja'=>$this->faker->date(),
            'pdf_acta_solicitud_baja'=>$this->faker->filePath(),
            'pdf_informe_deuda'=>$this->faker->filePath(),
            'pdf_solicitud_baja'=>$this->faker->filePath(),
            'expediente_id' => $this->faker->numberBetween(1,2),

        ];
    }
}
