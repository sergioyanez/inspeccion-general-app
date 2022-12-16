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
        Schema::create('logs_persona_juridica', function (Blueprint $table) {
            $table->id('id_logs_persona_juridica');
            $table->bigInteger('id_persona_juridica');
            $table->bigInteger('cuit_persona_juridica');
            $table->string('nombre_representante_pers_jurid');
            $table->string('apellido_representante_pers_jurid');
            $table->bigInteger('dni_representante_pers_jurid');
            $table->bigInteger('telefono_representante_pers_jurid');
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
        Schema::dropIfExists('logs_persona_juridica');
    }
};
