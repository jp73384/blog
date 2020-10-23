<?php

namespace App\Exports;

use App\Apadrinado;
use Maatwebsite\Excel\Concerns\FromCollection;
use App;
use App\TipoAyuda;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\select;

class ApadrinadosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $lista = DB::table('padrinos')
        ->join('apadrinados', 'padrinos.id', '=' , 'apadrinados.idPadrino')
        ->join('tipo_ayudas', 'apadrinados.idAyuda', '=' , 'tipo_ayudas.id')
        ->select("*", "padrinos.id as idPa", 'apadrinados.id as idApa', 'padrinos.nombre as nom')
        ->orderBy('apadrinados.id', 'asc')
        ->get();
        return $lista;
    }
}
