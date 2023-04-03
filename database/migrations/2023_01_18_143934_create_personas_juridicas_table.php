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
            $table->bigInteger('cuit')->unique();
            $table->string('nombre_persona_juridica',50);
            $table->string('nombre_representante',50)->nullable();
            $table->string('apellido_representante',50)->nullable();
            $table->bigInteger('dni_representante')->nullable();
            $table->bigInteger('telefono')->nullable();
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
