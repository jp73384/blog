<?php

namespace App\Http\Controllers;

use App\Padrino;
use Illuminate\Http\Request;

class PadrinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.padrino.padrinos');
    }

    public function verPadrino(){
        $listadoPadrino = Padrino::get();
        return view('admin.padrino.listarPadrino', ['listadoPadrino'=>$listadoPadrino]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return redirect('listado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function apadrinar(){
        return view('admin.beneficiados.apadrinar');
    }
}
