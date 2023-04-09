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
            $table->id();
            $table->bigInteger('expediente_id');
            $table->bigInteger('catastro_id')->nullable();
            $table->string('nro_expediente');
            $table->string('nro_comercio');
            $table->string('actividad_ppal');
            $table->string('anexo')->nullable();
            $table->string('pdf_solicitud')->nullable();
            $table->longText('bienes_de_uso')->nullable();
            $table->string('observaciones_grales')->nullable();
            $table->bigInteger('detalle_de_habilitacion_id')->nullable();
            $table->bigInteger('estado_baja_id')->nullable();
            $table->bigInteger('detalle_inmueble_id')->nullable();
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
        Schema::dropIfExists('logs_expedientes');
    }
};
