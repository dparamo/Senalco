<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmuebleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmueble', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_arrendatario');
            $table->foreign('id_arrendatario')->references('id')->on('arrendatario');
            $table->string('direccion');
            $table->text('Observaciones');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inmueble');
    }
}
