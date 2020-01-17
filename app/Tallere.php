<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tallere extends Model
{
    public function taller() {
        return $this->belongsTo("App\Tecnico");
    }
}
