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
        Schema::create('aviso', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_aviso');
            $table->unsignedBigInteger('avisado_por');
            $table->foreign('avisado_por')->references('id')->on('users');
            $table->unsignedBigInteger('expediente_id');
            $table->foreign('expediente_id')->references('id')->on('expedientes');
            $table->string('tipo_comunicacion');
            $table->string('detalle')->nullable();
            $table->string('archivo_pdf')->nullable();
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
        Schema::dropIfExists('aviso');
    }
};
