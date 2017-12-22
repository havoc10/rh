<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    //
 protected $table = 'archivos_persona';

  public function user()
    {
        return $this->belongsTo('App\Persona', 'idUsuario', 'id');
    }

}