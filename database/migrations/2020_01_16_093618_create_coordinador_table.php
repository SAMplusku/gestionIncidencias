<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordinadorTable extends CreatePersonaTable
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(string $tablename)
    {
        parent::up("coordinador");
        Schema::create('coordinador', function (Blueprint $table) {
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
        Schema::dropIfExists('coordinador');
    }
}
