<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contribuyente>
 */
class ContribuyenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tipo_dni_id'=>$this->faker->numberBetween(1,6),
            'estado_civil_id'=>$this->faker->numberBetween(1,4),
            'cuit'=>$this->faker->randomNumber(9),
            'ingresos_brutos'=>$this->faker->randomNumber(6),
            'nombre'=>$this->faker->name(),
            'apellido'=>$this->faker->lastName(),
            'dni'=>$this->faker->randomNumber(8),
            'fecha_nacimiento'=>$this->faker->date(),
            'telefono'=>$this->faker->randomNumber(9),
            'nombre_conyuge'=>$this->faker->name(),
            'apellido_conyuge'=>$this->faker->name(),
            'dni_conyuge'=>$this->faker->randomNumber(8)
        ];
    }
}
