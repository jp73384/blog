<?php

namespace App\Http\Controllers;

use App\Padrino;
use Illuminate\Http\Request;
use App;


class PadrinoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.padrino.padrinos');
    }

    public function editar($id)
    {
        $editar = new Padrino;
        $editar = Padrino::find($id);
        return view('admin.padrino.editar', compact('editar'));
    }

    public function verPadrino(){
        $listadoPadrino = Padrino::get();
        return view('admin.padrino.listarPadrino', ['listadoPadrino'=>$listadoPadrino]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $data  = request()->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'fecha' => 'required'
        ]);

        //insertar post
        $post = new Padrino();
        $post->nombre = request('nombre');
        $post->telefono = request('telefono');
        $post->fecha = request('fecha');
        
        $post->save(); //10.08-Curso de Laravel 6.0 - Crear el CRUD para Post - Upload Image para Post

    
        return redirect('listado')->with('mensaje', 'Registros satisfactorio!');
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $editar = new Padrino;
        $editar = Padrino::find($id);
        $editar->nombre = $request->nombre;
        $editar->telefono = $request->telefono;
        $editar->fecha = $request->fecha;

        $editar->save();

        return redirect('listado')->with('mensaje', 'Datos Actualizados!');
    }

    
    public function destroy($id)
    {
        $delete = new Padrino;
        $delete = Padrino::find($id);
        $delete->delete();

        return redirect('listado')->with('eliminar', 'Datos borrados!');

    }

    public function apadrinar(){
        return view('admin.beneficiados.apadrinar');
    }
}
