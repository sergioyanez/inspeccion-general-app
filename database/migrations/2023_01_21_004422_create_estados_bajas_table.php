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
        Schema::create('estados_bajas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_baja_id')->nullable();
            $table->foreign('tipo_baja_id')->references('id')->on('tipos_bajas')->onDelete('set null');
            $table->float('deuda');
            $table->date('fecha_baja');
            $table->string('pdf_acta_solicitud_baja');
            $table->string('pdf_informe_deuda');
            $table->string('pdf_solicitud_baja');
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
        Schema::dropIfExists('estados_bajas');
    }
};
