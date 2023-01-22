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
        Schema::create('informes_dependencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_dependencia_id')->nullable();
            $table->foreign('tipo_dependencia_id')->references('id')->on('tipos_dependencias')->onDelete('set null');
            $table->unsignedBigInteger('expediente_id');
            $table->foreign('expediente_id')->references('id')->on('expedientes');

            $table->string('pdf_informe')->nullable();
            $table->date('fecha_informe')->nullable();
            $table->longText('observaciones')->nullable();

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
        Schema::dropIfExists('informes_dependencias');
    }
};
