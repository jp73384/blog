<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Promociones;
use App\Talla;
use App\Categoria;
use App\Pedido;
use App\Contactano;

class PromocionesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function registrar(){

        $talla = new Talla;
        $talla = Talla::get();

        $categoria = new Categoria;
        $categoria = Categoria::get();

        return view('admin.promociones.adminPromo', [
            'talla'=>$talla,
            'categoria'=>$categoria
        ]);
    }

    public function ingresar(Request $request){

        //Obtener nombre de la imagen
        $fileNameWithTheExtension = request('foto')->getClientOriginalName();

        //nombre de la imagen
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);

        //extension de la imagen
        $extesion = request('foto')->getClientOriginalExtension();
        
        //nuevo nombe de la imagen
        $NewFileName = $fileName.'_'.time().'.'.$extesion;

        $path = request('foto')->storeAs('public/images/promociones', $NewFileName);


        $guardar = new Promociones;

        $guardar->precio = request('precio');
        $guardar->mensaje = request('mensaje');
        $guardar->colors = request('color');
        $guardar->estilo = request('estilo');
        $guardar->descripcion = request('descripcion');
        $guardar->foto = $NewFileName;
        $guardar->idCategoria = request('categoria');
        $guardar->idTalla = request('talla');

        $guardar->save();

        return back()->with('mensaje', 'Datos ingresados correctamente');
    }

    public function listadoPromociones(){
        
        $ofertas = DB::table('tallas')
        ->join('promociones', 'tallas.id', '=', 'promociones.idTalla')
        ->join('categorias', 'categorias.id', '=', 'promociones.idCategoria')
        ->select('*', 'promociones.id as idPro')
        ->orderBy('promociones.id', 'asc')
        ->get();

        return view('admin.promociones.listadoPromo',[
            'ofertas' => $ofertas
        ]);
    }

    public function editarPromo($id){

        $promocion = Promociones::find($id);
        $talla = Talla::get();
        $categoria = Categoria::get();
        $idCategoria = Categoria::find($promocion->idCategoria);
        $idTalla = Talla::find($promocion->idTalla);

        return view('admin.promociones.editarPromo', [
            'talla'=>$talla,
            'categoria'=>$categoria,
            'promocion'=>$promocion,
            'idCategoria' => $idCategoria,
            'idTalla' => $idTalla
        ]);
    }

    public function actualizarPromo(Request $request, $id){
        $actualizar = new Promociones;
        $actualizar = Promociones::findOrFail($id);
        
        if(!empty(request('foto'))){

            $fileNameWithTheExtension = request('foto')->getClientOriginalName();

            //nombre de la imagen
            $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);

            //extension de la imagen
            $extesion = request('foto')->getClientOriginalExtension();
        
            //nuevo nombe de la imagen
            $NewFileName = $fileName.'_'.time().'.'.$extesion;

            $path = request('foto')->storeAs('public/images/promociones', $NewFileName);
        
            $oldImage = public_path()."/storage/images/promociones/".$actualizar->foto;

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }


            $actualizar->precio = request('precio');
            $actualizar->mensaje = request('mensaje');
            $actualizar->colors = request('color');
            $actualizar->estilo = request('estilo');
            $actualizar->descripcion = request('descripcion');
            $actualizar->foto = $NewFileName;
            $actualizar->idCategoria = request('categoria');
            $actualizar->idTalla = request('talla');

            $actualizar->save();
            return back()->with('mensaje', 'Datos actualizados!');
            
        }else{
            $actualizar->precio = request('precio');
            $actualizar->mensaje = request('mensaje');
            $actualizar->colors = request('color');
            $actualizar->estilo = request('estilo');
            $actualizar->descripcion = request('descripcion');
            $actualizar->idCategoria = request('categoria');
            $actualizar->idTalla = request('talla');
            
            $actualizar->save();

            return back()->with('mensaje', 'Datos actualizados!');
        }
        
        
    }

    public function eliminar($id){
        $delete = new Promociones;
        $delete = Promociones::find($id);
        
        $delete->delete();

        return redirect('verpromociones')->with('mensajeEliminar', 'Los datos fuerón borrados correctamente!');
    }

    public function atender(){

        $pedido = DB::table('tallas')
        ->join('promociones', 'tallas.id', '=', 'promociones.idTalla')
        ->join('categorias', 'categorias.id', '=', 'promociones.idCategoria')
        ->join('pedidos', 'promociones.id', '=', 'pedidos.idPromocion')
        ->select('*', 'pedidos.id as pedido', 'pedidos.mensaje as personalizado')
        ->orderBy('pedidos.id', 'asc')
        ->get();


        return view('admin.promociones.pedido', [
            'pedido'=>$pedido
        ]);
    }

    public function confirmar($id){
        $confirmar = new Pedido;
        $confirmar = Pedido::find($id);

        $confirmar->estado = 0;

        $confirmar->save();

        return back()->with('mensaje', 'Producto vendido');
    }

    public function historial(){

        $pedido = DB::table('tallas')
        ->join('promociones', 'tallas.id', '=', 'promociones.idTalla')
        ->join('categorias', 'categorias.id', '=', 'promociones.idCategoria')
        ->join('pedidos', 'promociones.id', '=', 'pedidos.idPromocion')
        ->select('*', 'pedidos.id as pedido', 'pedidos.mensaje as personalizado')
        ->orderBy('pedidos.id', 'asc')
        ->get();

        return view('admin.promociones.historialVenta',[
            'pedido'=>$pedido
        ]);
    }

    public function verMensaje($id){

        $mensajes = Contactano::find($id);

        return view('admin.mensaje.verMensaje',[
            'mensajes' => $mensajes
        ]);
    }

    public function atender_mensaje($id){

        $actualizarM = new Contactano;
        $actualizarM = Contactano::find($id);

        $actualizarM->estado = 0;

        $actualizarM->save();

        return redirect('post');
    }
}
