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
        Schema::create('contribuyente_expediente', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('contribuyente_id');
            $table->foreign('contribuyente_id')->references('id')->on('contribuyentes')->onDelete('cascade');

            $table->unsignedBigInteger('expediente_id');
            $table->foreign('expediente_id')->references('id')->on('expedientes')->onDelete('cascade');

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
        Schema::dropIfExists('contribuyente_expediente');
    }
};
