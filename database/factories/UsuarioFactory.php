<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Usuario;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $token = Str::random(32);
        $image = "https://picsum.photos/500/300?random=".$this->faker->unique()->numerify('###');
        return [
            'foto' => $image,
            'correo' => $this->faker->unique()->safeEmail(),// hola-mundo
            'password' => '12345',// hola-mundo
            'tipo' => $this->faker->randomElement(['Alumno', 'Docente', 'Directivo', 'ControlEscolar']),// hola-mundo
            'token' => $token,// hola-mundo
            'status' => $this->faker->randomElement(['1', '0']),// hola-mundo
        ];
    }
}
