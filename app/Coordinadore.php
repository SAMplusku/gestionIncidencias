<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Persona;

class Coordinadore extends Persona
{

    public function persona() {
        return $this->hasOne("App\Persona");
    }

}
