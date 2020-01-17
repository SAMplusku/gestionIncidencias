<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Persona;

class Coordinador extends Persona
{

    public function persona() {
        return $this->belongsTo("App\Persona");
    }



}
