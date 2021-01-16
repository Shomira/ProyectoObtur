<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Establecimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Establecimientos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre')->unique();
        $table->string('clasificacion');
        $table->string('categoria');
        $table->integer('habitaciones');
        $table->integer('plazas');
        $table->unsignedBigInteger('idUsuario')->nullable;
        $table->foreign('idUsuario')->references('id')->on('Users')->onDelete('cascade');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Establecimientos');
    }
 
}
