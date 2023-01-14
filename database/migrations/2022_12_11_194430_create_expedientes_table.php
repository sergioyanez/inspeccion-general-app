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
        //    $table->bigInteger('id_persona_juridica')->nullable();
            $table->string('anexo')->nullable();
        //    $table->bigInteger('id_inmueble_afectado')->nullable();
        //    $table->bigInteger('id_estado_habilitacion');
            $table->date('fecha_habilitacion');
        //    $table->bigInteger('baja')->nullable();
        //    $table->bigInteger('id_estado_baja')->nullable();
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
