<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Persona
{
    public function incidencia() {
        return $this->belongsTo("App\Incidencia");
    }
}
