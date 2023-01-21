<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detalle_inmueble>
 */
class Detalle_inmuebleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'inmueble_id'=>$this->faker->numberBetween(1,10),
           'tipo_inmueble_id'=>$this->faker->numberBetween(1,3),
           'fecha_venc_alquiler'=>$this->faker->date()
        ];
    }
}
