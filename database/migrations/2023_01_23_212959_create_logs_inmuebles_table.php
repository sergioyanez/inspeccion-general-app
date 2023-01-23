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
        Schema::create('logs_inmuebles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('inmueble_id');
            $table->string('calle');
            $table->integer('numero')->nullable();
            $table->char('accion',1);
            $table->date('fecha_creacion');
            $table->date('fecha_modificacion');
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
        Schema::dropIfExists('logs_inmuebles');
    }
};
