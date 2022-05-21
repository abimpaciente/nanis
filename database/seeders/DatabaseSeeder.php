<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Docente;
use App\Models\Usuario;
use App\Models\Carrera;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Usuario::factory(20)->create();
        Alumno::factory(20)->create();
        Docente::factory(20)->create();
        Carrera::factory(5)->create();
        
        // \App\Models\User::factory(10)->create();
    }
}
