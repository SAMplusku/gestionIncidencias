<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public $timestamps = false;
    public function login() {
        return $this->hasOne("App\Login");
    }

    public function operador() {
        return $this->belongsTo("App\Operadore");
    }

    public function tecnico() {
        return $this->belongsTo("App\Tecnico");
    }

    public function gerente() {
        return $this->belongsTo("App\Gerente");
    }

    public function coordinador() {
        return $this->belongsTo("App\Coordinadore");
    }



}
