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
        Schema::create('logs_estados_bajas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('estado_baja_id');
            $table->bigInteger('tipo_baja_id');
            $table->float('deuda')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->string('pdf_acta_solicitud_baja')->nullable();
            $table->string('pdf_informe_deuda')->nullable();
            $table->string('pdf_solicitud_baja')->nullable();
            $table->char('accion',1);
            // $table->bigInteger('usuario_id');
            // $table->string('usuario_nombre');
            // $table->string('tipo',25);
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
        Schema::dropIfExists('logs_estados_bajas');
    }
};
