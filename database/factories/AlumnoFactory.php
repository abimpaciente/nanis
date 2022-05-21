<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    protected $model = Alumno::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'matricula' => $this->faker->unique()->numerify('##########'), 
            'nombre' => $this->faker->firstName('male'|'female'),
            'apellidoP' => $this->faker->lastName(),
            'apellidoM' => $this->faker->lastName(),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', 'now'),
            'fecha_ingreso' => $this->faker->date('Y-m-d', 'now'),
            'telefono' => $this->faker->unique()->numerify('##########'),
            'id_carrera' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
        ];
    }
}
