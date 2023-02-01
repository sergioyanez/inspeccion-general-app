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
        Schema::create('logs_contribuyentes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('contribuyente_id');
            $table->bigInteger('tipo_dni_id')->nullable();
            $table->bigInteger('estado_civil_id')->nullable();
            $table->bigInteger('cuit');
            $table->bigInteger('ingresos_brutos');
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->bigInteger('dni');
            $table->date('fecha_nacimiento');
            $table->bigInteger('telefono')->null;
            $table->string('nombre_conyuge',50)->nullable();
            $table->string('apellido_conyuge',50)->nullable();
            $table->bigInteger('dni_conyuge')->nullable();
            $table->char('accion',1);
            //$table->bigInteger('usuario_id');
            //$table->string('usuario_nombre');
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
        Schema::dropIfExists('logs_contribuyentes');
    }
};
