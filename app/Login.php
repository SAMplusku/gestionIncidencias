<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Login extends Authenticatable
{
    protected $fillable = ['usuario', 'constraseña'];
    public function persona() {
        return $this->belongsTo("App\Persona");
    }
}
