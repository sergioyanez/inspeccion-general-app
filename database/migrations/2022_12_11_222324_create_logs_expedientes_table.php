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
        Schema::create('logs_expedientes', function (Blueprint $table) {
            $table->id('id_logs_expedientes');
            $table->bigInteger('id_expedientes');
            $table->string('nro_expediente');
            $table->string('nro_comercio');
            $table->string('actividad_ppal');
            $table->bigInteger('id_persona_juridica');
            $table->string('anexo');
            $table->bigInteger('id_inmueble_afectado');
            $table->bigInteger('id_estado_habilitacion');
            $table->date('fecha_habilitacion');
            $table->bigInteger('baja');
            $table->bigInteger('id_estado_baja');
            $table->bigInteger('id_catastro');
            $table->string('bienes_de_uso');
            $table->text('observaciones_grales');
            $table->char('accion');
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();
            $table->bigInteger('id_usuario');
            $table->string('nombre_usuario');
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
        Schema::dropIfExists('logs_expedientes');
    }
};
