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
        Schema::create('logs_tipo_baja', function (Blueprint $table) {
            $table->id('id_logs_tipo_baja');
            $table->bigInteger('id_tipo_baja_id');
            $table->string('descripcion',100);
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
        Schema::dropIfExists('logs_tipo_baja');
    }
};
