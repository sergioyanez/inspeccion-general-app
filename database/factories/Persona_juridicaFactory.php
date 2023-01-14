<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona_juridica>
 */
class Persona_juridicaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cuit'=> $this->faker->randomNumber(8),
            'nombre_repesentante'=> $this->faker->name(),
            'apellido_repesentante'=> $this->faker->lastName(),
            'dni_representante'=> $this->faker->randomNumber(8),
            'telefono'=> $this->faker->randomNumber(8)
        ];
    }
}
