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
        Schema::create('inmmueble_afectado', function (Blueprint $table) {
            $table->id('id_inmueble_afectado');
            $table->string('descripcion');
            $table->bigInteger('id_domicilios');
            $table->bigInteger('id_tipo_inmueble');

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
        Schema::dropIfExists('inmmueble_afectado');
    }
};
