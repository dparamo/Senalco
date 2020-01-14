<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->Increments('id');
            $table-> unsignedInteger('id_inquilino');
            $table->foreign('id_inquilino')->references('id')->on('inquilino');
            $table->unsignedInteger('id_inmueble');
            $table->foreign('id_inmueble')->references('id')->on('inmueble');
            $table->unsignedInteger('id_contrato');
            $table->foreign('id_contrato')->references('id')->on('contrato');
            $table->enum('periodo',['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre']);
            $table->integer('avaladora');//POLIZA
            $table->integer('multas');
            $table->integer('otros');
            $table->integer('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
}
