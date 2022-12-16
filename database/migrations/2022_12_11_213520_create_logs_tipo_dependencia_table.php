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
        Schema::create('logs_tipo_dependencia', function (Blueprint $table) {
            $table->id('id_logs_tipo_dependencia');
            $table->string('nombre_dep');
            $table->text('observaciones_logs_tipo_dependencia');
            $table->date('fecha_informe_logs_tipo_dependencia');
            $table->char('accion');
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();
            $table->bigInteger('id_usuario');
            $table->string('nombre_usuario');
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
        Schema::dropIfExists('logs_tipo_dependencia');
    }
};
