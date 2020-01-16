<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre");
            $table->string("dni");
            $table->integer("telefono");
            $table->string("apellidos");
            $table->integer("edad");
            $table->string("direccion");
            $table->string("foto");
            $table->string("jornada");
            $table->boolean("estado");
            $table->string("localizacion");
            $table->string("tipo");
            $table->unsignedBigInteger("id_login");
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
