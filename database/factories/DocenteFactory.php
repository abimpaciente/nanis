<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName('male'|'female'),
            'apellidoP' => $this->faker->lastName(),
            'apellidoM' => $this->faker->lastName(),            
            'clave_profesional' => $this->faker->unique()->numerify('#####'),
            'genero' => $this->faker->randomElement(['H', 'M']),// hola-mundo
            'estado_civil' => $this->faker->randomElement(['S', 'C']),
            'cedula_fiscal' => $this->faker->unique()->numerify('#######'),
            'nss' => $this->faker->unique()->numerify('########'),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', 'now'),
            'fecha_ingreso' => $this->faker->date('Y-m-d', 'now'),
            'telefono' => $this->faker->unique()->numerify('##########'),
        ];
    }
}
