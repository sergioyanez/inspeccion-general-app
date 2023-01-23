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
        Schema::create('logs_detalles_habilitaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('detalle_habilitacion_id');
            $table->bigInteger('tipo_habilitacion_id')->nullable();
            $table->bigInteger('tipo_estado_id')->nullable();
            $table->date('fecha_vencimiento');
            $table->date('fecha_primer_habilitacion');
            $table->string('pdf_certificado_habilitacion');
            $table->char('accion',1);
            $table->date('fecha_creacion');
            $table->date('fecha_modificacion');
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
        Schema::dropIfExists('logs_detalle_habilitacions');
    }
};
