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
        Schema::create('persona_juridica', function (Blueprint $table) {
            $table->id('id_persona_juridica');
            $table->bigInteger('cuit_persona_juridica');
            $table->string('nombre_representante_pers_jurid');
            $table->string('apellido_representante_pers_jurid');
            $table->bigInteger('dni_representante_pers_jurid');
            $table->bigInteger('telefono_representante_pers_jurid');
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
        Schema::dropIfExists('persona_juridica');
    }
};
