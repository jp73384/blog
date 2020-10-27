<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apadrinado extends Model
{
    public function tipo()
    {
        return $this->belongsTo('App\TipoAyuda', 'idAyuda');
    }
    public function padrino_id()
    {
        return $this->belongsTo('App\Padrino', 'idPadrino');
    } 
}
