<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Exports\ExportarPadrino;
use App\Exports\Exportar;


use App\Padrino;
use Illuminate\Http\Request;
use App;
use App\Apadrinado;
use App\TipoAyuda;

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
        $listadoPadrino = DB::table('padrinos')
        ->where('padrinos.estado', '=', '1')
        ->get();
        return view('admin.padrino.listarPadrino', ['listadoPadrino'=>$listadoPadrino]);
    }

    public function lista()
    {
        $lista = DB::table('padrinos')
                            ->join('apadrinados', 'padrinos.id', '=' , 'apadrinados.idPadrino')
                            ->join('tipo_ayudas', 'apadrinados.idAyuda', '=' , 'tipo_ayudas.id')
                            ->select("*", "padrinos.id as idPa", 'apadrinados.id as idApa', 'padrinos.nombre as nom')
                            ->orderBy('apadrinados.id', 'asc')
                            ->paginate(10);
        
        return view('admin.beneficiados.listarApadrinado', ['lista'=>$lista] );
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
        $post->estado = 1;
        $post->save(); 

    
        return redirect('listado')->with('mensaje', 'Registros satisfactorio!');
    }

    public function save(Request $request)
    {
        $guardar = new Apadrinado;
        $guardar->nombre = request('nombre');
        $guardar->nacimiento = request('fecha');
        $guardar->edad = request('edad');
        $guardar->dpi = request('dpi');
        $guardar->direccion = request('direccion');
        $guardar->telefono = request('telefono');
        $guardar->idAyuda = request('tipoAyuda');
        $guardar->idPadrino = request('apadrinado');
        
        $guardar->save();

        return redirect('apadrinar')->with('mensaje', 'Datos registrados!');
    }

    public function editar_padrino($id)
    {
        $editar = new Apadrinado;
        $editar = Apadrinado::find($id);

        $apadrinado = new Padrino;
        $apadrinado = DB::table('padrinos')
        ->where('padrinos.estado','=', '1')
        ->get();

        $ayuda = new TipoAyuda;
        $ayuda = TipoAyuda::get();

        $padrinoId = Padrino::find($editar->idPadrino);
        $ayudaId = TipoAyuda::find($editar->idAyuda);

        return view('admin.beneficiados.editarApadrino', [ 'editar' => $editar, 'apadrinado'=>$apadrinado, 'ayuda'=>$ayuda, 'padrinoId' => $padrinoId, 'ayudaId' => $ayudaId]);
    }

    public function actualizar_padrino(Request $request, $id)
    {
        $actualizar = new Apadrinado;
        $actualizar = Apadrinado::find($id);

        $actualizar->nombre = $request->nombre;
        $actualizar->nacimiento = $request->fecha;
        $actualizar->edad = $request->edad;
        $actualizar->dpi = $request->dpi;
        $actualizar->direccion = $request->direccion;
        $actualizar->telefono = $request->telefono;
        $actualizar->idAyuda = $request->tipoAyuda;
        $actualizar->idPadrino = $request->apadrinado;

        $actualizar->save();

        return back()->with('mensaje', 'Datos actualizados correctamente');
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
        $delete->estado = 0;
        $delete->save();

        return redirect('listado')->with('eliminar', 'Datos borrados!');

    }

    public function delete($id)
    {
        $delete = new Apadrinado;
        $delete = Apadrinado::find($id);
        $delete->delete();
        return redirect('apadrinados')->with('eliminar', 'Datos borrados!');
    }

    public function apadrinar(){

        $apadrinado = DB::table('padrinos')
        ->where('padrinos.estado', '=', '1')
        ->get();

        $ayuda = new TipoAyuda;
        $ayuda = TipoAyuda::get();
        
        return view('admin.beneficiados.apadrinar', ['apadrinado'=>$apadrinado, 'ayuda'=>$ayuda]);

    }
}
