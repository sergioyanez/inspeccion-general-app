<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\informe_dependencias>
 */
class Informe_dependenciasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        
        return [

            'tipo_dependencia_id'=>$this->faker-> numberBetween(1,10),
            'pdf_informe'=>$this->faker->url(),
            'fecha_informe'=>$this->faker->date(),
            'observaciones'=>$this->faker->paragraph(),
            'expediente_id'=>$this->faker-> numberBetween(1,10),
           
        ];
    }
}
