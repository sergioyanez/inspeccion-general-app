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
        Schema::create('logs_detalles_inmuebles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('detalle_inmueble_id');
            $table->bigInteger('inmueble_id')->nullable();
            $table->bigInteger('tipo_inmueble_id')->nullable();
            $table->date('fecha_venc_alquiler')->nullable();
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
        Schema::dropIfExists('logs_detalles_inmuebles');
    }
};
