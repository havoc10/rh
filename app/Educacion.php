<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educacion extends Model
{
    protected $table = 'educacion';



          public function user()
    {
        return $this->belongsTo('App\Persona', 'id', 'idUsuario');
    }

         public function delaedu()
      {
        return $this->hasOne('App\TipoEducacion', 'id', 'idTipoeducacion');


      }
  		public function scopeAnio($query)
    {
        return $query->orderBy('anio', 'desc');
    }



}
