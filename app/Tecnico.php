<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Persona;

class Tecnico extends Persona
{
    public function incidencia() {
        return $this->belongsTo("App\Incidencia");
    }

    public function persona() {
        return $this->hasOne("App\Persona");
    }

    public function taller() {
        return $this->hasOne("App\Taller");
    }
}
