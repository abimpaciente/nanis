<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Carrera;

class CarreraFactory extends Factory
{
    protected $model = Carrera::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'foto' => '', 
            'clave' => $this->faker->unique()->numerify('##########'),// hola-mundo
            'nombre_carrera' => $this->faker->unique()->randomElement(['Sistemas', 'Informatica', 'Bioquimica', 'Contador', 'Industrial']),// hola-mundo
            'descripcion' => $this->faker->sentence(),// hola-mundo
            'area' => $this->faker->randomElement(['Informatica', 'Sistemas', 'Contaduria']),// hola-mundo
            'semestres' => $this->faker->randomElement(['6', '8', '12']),// hola-mundo
        ];
    }
}
