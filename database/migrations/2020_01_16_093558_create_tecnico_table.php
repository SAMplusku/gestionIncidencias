<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnicoTable extends CreatePersonaTable
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(string $tablename)
    {
        parent::up("tecnico");
        Schema::create('tecnico', function (Blueprint $table) {
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
