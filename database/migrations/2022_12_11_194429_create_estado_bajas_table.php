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
        Schema::create('estados_baja', function (Blueprint $table) {
            $table->id();
            $table->double('deuda');
            $table->date('fecha_baja');
            $table->text('pdf_acta_solicitud_baja');
            $table->text('pdf_informe_deuda');
            $table->text('pdf_solicitud_baja');
            $table->unsignedBigInteger('tipos_baja_id');
            $table->foreign('tipos_baja_id')->references('id')->on('tipos_baja')->onDelete('cascade');
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
        Schema::dropIfExists('estado_bajas');
    }
};
