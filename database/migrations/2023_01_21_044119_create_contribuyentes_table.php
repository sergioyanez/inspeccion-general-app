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
            $table->id();

            $table->unsignedBigInteger('tipo_dni_id')->nullable();
            $table->foreign('tipo_dni_id')->references('id')->on('tipos_dni')->onDelete('set null');

            $table->unsignedBigInteger('estado_civil_id')->nullable();
            $table->foreign('estado_civil_id')->references('id')->on('estados_civiles')->onDelete('set null');

            $table->bigInteger('cuit');
            $table->bigInteger('ingresos_brutos');
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->bigInteger('dni');
            $table->date('fecha_nacimiento');
            $table->bigInteger('telefono')->nullable();
            $table->string('nombre_conyuge',50)->nullable();
            $table->string('apellido_conyuge',50)->nullable();
            $table->bigInteger('dni_conyuge')->nullable();
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
