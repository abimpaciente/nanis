<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->text('apellidoP');
            $table->text('apellidoM')->nullable();
            $table->text('clave_profesional')->nullable();
            $table->text('genero')->nullable();
            $table->text('estado_civil')->nullable();
            $table->text('cedula_fiscal')->nullable();
            $table->text('nss')->nullable();
            $table->text('fecha_nacimiento')->nullable();
            $table->text('fecha_ingreso')->nullable();
            $table->text('telefono')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente');
    }
}
