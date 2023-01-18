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
        // return [
        //     'tiposdni_id'=>$this->faker->numberBetween(1,6),
        //     'numero_dni'=>$this->faker->randomNumber(8),
        //     'nombre'=>$this->faker->name(),
        //     'apellido'=>$this->faker->lastName(),
        //     'cuit_contribuyente'=>$this->faker->randomNumber(9),
        //     'telefono_contribuyente'=>$this->faker->randomNumber(9),
        //     'fecha_nacimiento'=>$this->faker->date(),
        //     'ingresos_brutos'=>$this->faker->randomNumber(6),
        //     'estados_civiles_id'=>$this->faker->numberBetween(1,4),
        //     'nombre_conyuge'=>$this->faker->name(),
        //     'apellido_conyuge'=>$this->faker->lastName(),
        //     'dni_conyuge'=>$this->faker->randomNumber(8)
        // ];
    }
}
