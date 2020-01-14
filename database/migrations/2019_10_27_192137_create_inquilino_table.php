<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquilinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquilino', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->text('observaciones');
            $table->enum('estado',['aldia','atrasado','urgente','juridico']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquilino');
    }
}
