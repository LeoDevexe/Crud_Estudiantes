<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'cedula'=>fake()->unique()->numerify('##########'),
            'nombres'=>fake()->firstName(),
            'apellidos'=>fake()->lastName(),
            'email'=>fake()->unique()->email(),
            'edad'=>fake()->numberBetween(18,40)
        ];
    }
}