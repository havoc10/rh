<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
     protected $table = 'especialidad';


         public function users()
      {
        return $this->hasMany('App\Persona', 'especialidad', 'id');
      }
}
