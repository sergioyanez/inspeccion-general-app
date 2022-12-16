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
        Schema::create('logs_catastro', function (Blueprint $table) {
            $table->id('id_logs_catastro');
            $table->bigInteger('id_catastro');
            $table->string('circuncripcion');
            $table->string('seccion');
            $table->string('chacra');
            $table->string('quinta');
            $table->string('fraccion');
            $table->string('manzana');
            $table->string('parcela');
            $table->string('sub_parcela');
            $table->text('observacion');
            $table->date('fecha_informe_catastro');
            $table->char('accion');
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();
            $table->bigInteger('id_usuario');
            $table->string('nombre_usuario');
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
        Schema::dropIfExists('logs_catastro');
    }
};
