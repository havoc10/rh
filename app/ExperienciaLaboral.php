<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
    //
 protected $table = 'experiencia_laboral';

 public function user()
    {
        return $this->belongsTo('App\Persona', 'idUsuario', 'id');
    }

}