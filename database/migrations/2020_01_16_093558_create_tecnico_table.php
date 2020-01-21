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

        Schema::create('tecnicos', function (Blueprint $table) {
            $table->unsignedBigInteger("id_persona");
            $table->string("localizacion");
            $table->string("especializacion");
            $table->boolean("disponibilidad");
            $table->string("jornada");
            $table->string("comunidad");
            $table->unsignedBigInteger("id_taller");
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
