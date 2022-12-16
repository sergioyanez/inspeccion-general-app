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
        Schema::create('contribuyentes', function (Blueprint $table) {
            $table->id('id_contribuyentes');
            $table->bigInteger('id_tipo_dni');
            $table->bigInteger('numero_dni');
            $table->string('nombre');
            $table->string('apellido');
            $table->bigInteger('cuit_contribuyente');
            $table->bigInteger('telefono_contribuyente');
            $table->date('fecha_nacimiento');
            $table->string('ingresos_brutos');
            $table->bigInteger('id_estado_civil');
            $table->string('nombre_conyuge');
            $table->string('apellido_conyuge');
            $table->bigInteger('dni_conyuge');
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
        Schema::dropIfExists('contribuyentes');
    }
};
