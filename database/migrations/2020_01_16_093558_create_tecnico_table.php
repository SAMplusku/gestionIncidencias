<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnicoTable extends migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tecnico', function (Blueprint $table) {
            $table->unsignedBigInteger("id_persona");
            $table->string("localizacion");
            $table->string("especialiciacion");
            $table->string("disponibilidad");
            $table->string("jornada");
            $table->unsignedBigInteger("id_taller");
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
        Schema::dropIfExists('tecnico');
    }
}
