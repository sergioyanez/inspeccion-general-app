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
        Schema::create('logs_catastros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catastro_id');
            $table->string('circunscripcion',10);
            $table->string('seccion',10);
            $table->string('chacra',10);
            $table->string('quinta',10);
            $table->string('fraccion',10);
            $table->string('manzana',10);
            $table->string('parcela',10);
            $table->string('sub_parcela',10);
            $table->string('observacion')->nullable();
            $table->date('fecha_informe')->nullable();
            $table->string('pdf_informe')->nullable();
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
        Schema::dropIfExists('logs_catastros');
    }
};
