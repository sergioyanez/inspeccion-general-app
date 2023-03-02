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
        Schema::create('expediente_contribuyente', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('expediente_id')->nullable();
            $table ->foreign('expediente_id')->references('id')->on('expedientes')->onDelete('set null');

            $table->unsignedBigInteger('contribuyente_id')->nullable();
            $table ->foreign('contribuyente_id')->references('id')->on('contribuyentes')->onDelete('set null');


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
        Schema::dropIfExists('expediente_contribuyente');
    }
};
