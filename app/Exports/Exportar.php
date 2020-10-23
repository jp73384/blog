<?php

namespace App\Exports;

use App\Apadrinado;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class Exportar implements FromView
{
    use Exportable; 

    public function view(): View
    {
        $lista = DB::table('padrinos')
                            ->join('apadrinados', 'padrinos.id', '=' , 'apadrinados.idPadrino')
                            ->join('tipo_ayudas', 'apadrinados.idAyuda', '=' , 'tipo_ayudas.id')
                            ->select("*", "padrinos.id as idPa", 'apadrinados.id as idApa', 'padrinos.nombre as nom')
                            ->orderBy('apadrinados.id', 'asc')
                            ->get();


        return view('admin.excel.excel', ['lista' => $lista] );
    }

    public function collection()
    {
        return Apadrinado::all();
    }
}
