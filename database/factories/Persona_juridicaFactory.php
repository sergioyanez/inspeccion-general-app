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
            'cuit'=>$this->faker->numberBetween(20000000000,33999999999),
            'nombre_representante'=>$this->faker->name(),
            'apellido_representante'=>$this->faker->lastName(),
            'dni_representante'=>$this->faker->randomNumber(8),
            'telefono'=>$this->faker->numberBetween(1000000000,9999999999)
        ];
    }
}
