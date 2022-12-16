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
        Schema::create('logs_usuarios', function (Blueprint $table) {
            $table->id('id_logs_usuarios');
            $table->bigInteger('id_usuario');
            $table->string('nombre_usuario');
            $table->string('password_usuario');
            $table->bigInteger('id_tipo_permiso');
            $table->string('descripcion',100);
            $table->char('accion');
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();
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
        Schema::dropIfExists('logs_usuarios');
    }
};
