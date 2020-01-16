<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operador', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre");
            $table->string("dni");
            $table->integer("telefono");
            $table->string("apellidos");
            $table->integer("edad");
            $table->string("direccion");
            $table->string("foto");
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
        Schema::dropIfExists('operador');
    }
}
