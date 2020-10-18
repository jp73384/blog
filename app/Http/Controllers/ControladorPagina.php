<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    /*public function padrinos(){
        return view('admin.padrinos');
    }*/


}
