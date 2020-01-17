<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Persona;

class Operador extends Persona
{

    public function incidencia() {
        return $this->belongsTo("App\Incidencia");
    }

    public function persona() {
        return $this->hasOne("App\Persona");
    }

}
