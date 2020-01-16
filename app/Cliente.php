<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function incidencia() {
        return $this->belongsTo("App\Incidencia");
    }

    public function vehiculo() {
        return $this->hasOne("App\Vehiculo");
    }
}
