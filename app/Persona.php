<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public function login() {
        return $this->hasOne("App\Login");
    }
}
