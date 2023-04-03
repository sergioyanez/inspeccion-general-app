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
        Schema::create('logs_personas_juridicas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('persona_juridica_id');
            $table->bigInteger('cuit');
            $table->string('nombre_persona_juridica',50);
            $table->string('nombre_representante',50);
            $table->string('apellido_representante',50);
            $table->bigInteger('dni_representante')->nullable();
            $table->bigInteger('telefono');
            $table->char('accion',1);
            $table->bigInteger('usuario_id');
            $table->string('usuario_nombre');
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
        Schema::dropIfExists('logs_personas_juridicas');
    }
};
