<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apadrinado extends Model
{
    public function ayuda()
    {
        return $this->belongsTo('App\TipoAyuda', 'idAyuda');
    }  
    public function aaa()
    {
        return $this->belongsTo('App\Padrino', 'idPadrino');
    }  
}
