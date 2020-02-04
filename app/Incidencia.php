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




    protected $fillable = ['localizacion','latitud','longitud','tipo','fechafin','fechainicio','estado','descripcion','observacion','id_tecnico','id_operador','id_cliente'];
}
