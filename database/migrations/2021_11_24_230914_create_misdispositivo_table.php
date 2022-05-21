<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisdispositivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('misdispositivo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario')->nullable();
            $table->text('tipo');
            $table->text('navegador');
            $table->text('dispositivo');
            $table->text('ip');
            $table->text('fecha');
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
        Schema::dropIfExists('misdispositivo');
    }
}
