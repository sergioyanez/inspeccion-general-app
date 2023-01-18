<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_juridicas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cuit');
            $table->string('nombre_representante',50);
            $table->string('apellido_representante',50);
            $table->bigInteger('dni_representante');
            $table->bigInteger('telefono');
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
        Schema::dropIfExists('personas_juridicas');
    }
};
