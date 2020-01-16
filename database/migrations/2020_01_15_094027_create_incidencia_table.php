<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("localizacion");
            $table->string("tipo");
            $table->date("fecha");
            $table->boolean("estado");
            $table->string("descripion");
            $table->string("observacion");
            $table->unsignedBigInteger("id_tecnico");
            $table->unsignedBigInteger("id_operador");
            $table->unsignedBigInteger("id_cliente");
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
        Schema::dropIfExists('incidencia');
    }
}
