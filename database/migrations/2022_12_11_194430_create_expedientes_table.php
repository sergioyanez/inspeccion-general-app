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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id('id');
            $table->string('nro_expediente');
            $table->string('nro_comercio');
            $table->string('actividad_ppal');

            $table->unsignedBigInteger('persona_juridica_id')->nullable();
            $table->foreign('persona_juridica_id')->references('id')->on('personas_juridicas')->onDelete('set null');

            $table->string('anexo')->nullable();
        //    $table->bigInteger('id_inmueble_afectado')->nullable();

            $table->unsignedBigInteger('estado_habilitacion_id')->nullable();
            $table->foreign('estado_habilitacion_id')->references('id')->on('estados_habilitacion')->onDelete('set null');

            $table->date('fecha_habilitacion');
        //    $table->bigInteger('baja')->nullable();

             $table->unsignedBigInteger('estado_baja_id')->nullable();
             $table->foreign('estado_baja_id')->references('id')->on('estados_baja')->onDelete('set null');

            $table->string('pdf_solicitud');
        //    $table->bigInteger('id_catastro')->nullable();
            $table->string('bienes_de_uso')->nullable();
            $table->text('observaciones_grales')->nullable();
            $table->string('pdf_certificado_habilitacion')->nullable();
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
        Schema::dropIfExists('expedientes');
    }
};
