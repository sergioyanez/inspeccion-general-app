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
            $table->id();
            $table->unsignedBigInteger('catastro_id')->nullable();
            $table->string('nro_expediente');
            $table->string('nro_comercio');
            $table->string('actividad_ppal');
            $table->string('anexo')->nullable();
            $table->string('pdf_solicitud');
            $table->longText('bienes_de_uso')->nullable();
            $table->string('observaciones_grales')->nullable();
            $table->unsignedBigInteger('detalle_de_habilitacion_id');
            $table->unsignedBigInteger('detalle_inmueble_id');

           $table ->foreign('catastro_id')->references('id')->on('catastros')->onDelete('set null');
           $table ->foreign('detalle_de_habilitacion_id')->references('id')->on('detalles_habilitaciones');
            $table ->foreign('detalle_inmueble_id')->references('id')->on('detalles_inmuebles');
            

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
