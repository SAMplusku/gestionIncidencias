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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("localizacion")->default('calle pozoa');
            $table->string("tipo");
            $table->date("fechafin")->nullable();
            $table->boolean("estado")->default(1);
            $table->string("descripcion");
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
