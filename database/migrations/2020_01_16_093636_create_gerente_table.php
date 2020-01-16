<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerenteTable extends CreatePersonaTable
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(string $tablename)
    {
        parent::up("gerente");
        Schema::create('gerente', function (Blueprint $table) {
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
        Schema::dropIfExists('gerente');
    }
}
