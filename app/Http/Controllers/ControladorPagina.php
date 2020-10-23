<?php

namespace App\Http\Controllers;


use App\Padrino;
use Illuminate\Http\Request;

use App\Exports\Exportar;
use PDF;
use Illuminate\Support\Facades\DB;


class ControladorPagina extends Controller
{

    public function acerca(){
        return view('acerca');
    }

    public function contacto(){
        return view('contacto');
    }

    public function inicio(){
        return view('inicio');
    }

    public function administrador(){
        return view('admin.index');
    }

    public function post(){
        return view('admin.post');
    }

    public function reporte(){

        $reporte = Padrino::paginate(10);


        return view('admin.pdf.reporte', compact('reporte'));
    }

    public function descargar()
    {
        $reporte = Padrino::all();
        $pdf = PDF::loadView('admin.pdf.descargar', ['reporte'=>$reporte]);

        return $pdf->stream();
    }

    public function excel(){
        return (new Exportar)->download('apadrinados.xlsx');
    }


}
