<?php

namespace App\Exports;

use App\Padrino;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportarPadrino implements FromView
{
    
    use Exportable; 

    public function view(): View
    {
        $listadoPadrino = new Padrino;
        $listadoPadrino = Padrino::get();

        return view('admin.excel.padrino_excel', ['listadoPadrino' => $listadoPadrino] );
    }
    
}
