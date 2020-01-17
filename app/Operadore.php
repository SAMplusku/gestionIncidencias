<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Persona;

class Operadore extends Persona
{

    public function incidencia() {
        return $this->belongsTo("App\Incidencia");
    }

    public function persona() {
        return $this->belongsTo("App\Persona");
    }

}
