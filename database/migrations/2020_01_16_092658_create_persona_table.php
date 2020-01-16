<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(string $tablename)
    {
        Schema::create($tablename, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nombre");
            $table->string("dni");
            $table->string("email");
            $table->integer("telefono");
            $table->string("apellidos");
            $table->integer("edad");
            $table->string("direccion");
            $table->string("foto");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
