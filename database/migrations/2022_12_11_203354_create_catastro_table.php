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
        Schema::create('catastro', function (Blueprint $table) {
            $table->id('id_catastro');
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
            $table->string('pdf_informe_catastro');
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
        Schema::dropIfExists('catastro');
    }
};
