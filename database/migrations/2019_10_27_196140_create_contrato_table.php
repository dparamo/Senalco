<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('id_inquilino');
            $table->foreign('id_inquilino')->references('id')->on('inquilino');
            $table->unsignedInteger('id_inmueble');
            $table->foreign('id_inmueble')->references('id')->on('inmueble');
            $table->string('inicontrato');
            $table->string('fincontrato');
            $table->integer('valorcanon');
            $table->integer('valoradmin');
            $table->integer('total');
            $table->text('observaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrato');
    }
}
