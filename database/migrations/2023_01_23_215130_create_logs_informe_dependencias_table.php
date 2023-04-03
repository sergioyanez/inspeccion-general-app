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
        Schema::create('logs_informes_dependencias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('informe_dependencia_id');
            $table->bigInteger('tipo_dependencia_id')->nullable();
            $table->bigInteger('expediente_id');
            $table->string('pdf_informe')->nullable();
            $table->date('fecha_informe')->nullable();
            $table->longText('observaciones')->nullable();
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
        Schema::dropIfExists('logs_informes_dependencias');
    }
};
