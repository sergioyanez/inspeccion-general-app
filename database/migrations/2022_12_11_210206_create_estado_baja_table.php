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
        Schema::create('estado_baja', function (Blueprint $table) {
            $table->id('id_estado_baja');
            $table->bigInteger('id_tipo_baja');
            $table->float('deuda');
            $table->date('fecha_baja');
            $table->string('pdf_informe_dueda');
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
        Schema::dropIfExists('estado_baja');
    }
};
