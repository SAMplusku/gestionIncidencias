<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    public function cliente() {
        return $this->belongsTo("App\Cliente");
    }




    protected $fillable = ['matricula','tipo','modelo','kilometraje','marca'];
}
