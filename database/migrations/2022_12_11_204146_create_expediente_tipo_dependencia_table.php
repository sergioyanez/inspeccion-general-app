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
        Schema::create('expediente_tipo_dependencia', function (Blueprint $table) {
            $table->id('id_expediente_tipo_dependencia');
            $table->bigInteger('id_expedientes');
            $table->bigInteger('id_tipo_dependencia');
            $table->string('pdf_informe_dependencia');
            $table->text('observaciones_dependencia');
            $table->date('fecha_informe_dependencia');
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
        Schema::dropIfExists('expediente_tipo_dependencia');
    }
};
