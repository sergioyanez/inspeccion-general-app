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
            $table->id('id');

            $table->unsignedBigInteger('tiposdni_id');
            $table->foreign('tiposdni_id')->references('id')->on('tipos_dni')->onDelete('cascade');

            $table->bigInteger('numero_dni');
            $table->string('nombre');
            $table->string('apellido');
            $table->bigInteger('cuit_contribuyente');
            $table->bigInteger('telefono_contribuyente')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('ingresos_brutos');

            $table->unsignedBigInteger('estados_civiles_id');
            $table->foreign('estados_civiles_id')->references('id')->on('estados_civiles')->onDelete('cascade');

            $table->string('nombre_conyuge')->nullable();
            $table->string('apellido_conyuge')->nullable();
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
