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
        Schema::create('logs_aviso', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('aviso_bd_id');
            $table->bigInteger('usuario_bd_id');//id del usuario en la tabla user
            $table->string('usuario');//nombre del usuario en la tabla user
            $table->date('fecha_aviso');
            $table->bigInteger('avisado_por');
            $table->bigInteger('expediente_id');
            $table->string('tipo_comunicacion');
            $table->string('detalle')->nullable();
            $table->string('archivo_pdf')->nullable();
            $table->char('accion',1);
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
        Schema::dropIfExists('logs_aviso');
    }
};
