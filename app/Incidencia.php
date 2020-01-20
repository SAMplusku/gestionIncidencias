<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{

    public function tecnico() {
        return $this->hasOne("App\Tecnico");
    }

    public function operador() {
        return $this->hasOne("App\Operadore");
    }

    public function cliente() {
        return $this->hasOne("App\Cliente");
    }
}
