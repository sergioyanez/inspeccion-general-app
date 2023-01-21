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
        Schema::create('detalles_habilitaciones', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tipo_habilitacion_id')->nullable();
            $table->foreign('tipo_habilitacion_id')->references('id')->on('tipos_habilitaciones')->onDelete('set null');

            $table->unsignedBigInteger('tipo_estado_id')->nullable();
            $table->foreign('tipo_estado_id')->references('id')->on('tipos_estados')->onDelete('set null');

            $table->date('fecha_vencimiento');
            $table->date('fecha_primer_habilitacion');
            $table->string('pdf_certificado_habilitacion');

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
        Schema::dropIfExists('detalles_habilitaciones');
    }
};
