<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catastro>
 */
class CatastroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'circunscripcion'=>$this->faker->text(10),
            'seccion'=>$this->faker->text(10),
            'chacra'=>$this->faker->text(10),
            'quinta'=>$this->faker->text(10),
            'fraccion'=>$this->faker->text(10),
            'manzana'=>$this->faker->text(10),
            'parcela'=>$this->faker->text(10),
            'sub_parcela'=>$this->faker->text(10),
            'observacion'=>$this->faker->sentence(),
            'fecha_informe'=>$this->faker->date(),
            'pdf_informe'=>$this->faker->sentence(),




        ];
    }
}
