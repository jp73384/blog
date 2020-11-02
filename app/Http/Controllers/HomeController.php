<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Contactano;
use App\Promociones;
use App\Categoria;
use App\Talla;
use App\Pedido;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->simplePaginate(3);

        return view('home', ['posts'=>$posts]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        
        return view('/show', ['post' => $post]);
    }

    public function store(Request $request){
        $comment = new Contactano();
        $comment->nombre = request('name');
        $comment->correo = request('email');
        $comment->telefono = request('phone');
        $comment->mensaje = request('message');
        $comment->estado = '1';

        $comment->save();

        return back()->with('mensaje',' ');
    }

    public function ofertas(){
        $ofertas = DB::table('tallas')
                    ->join('promociones', 'tallas.id', '=', 'promociones.idTalla')
                    ->join('categorias', 'categorias.id', '=', 'promociones.idCategoria')
                    ->select('*','promociones.id as idPromo')
                    ->where('promociones.estado', '=', '1')
                    ->get();

        return view('admin.promociones.ofertas', [
            'ofertas'=>$ofertas
        ]);
    }

    public function pedidos(Request $request){
        $pedido = new Pedido;
        $pedido->nombre = request('nombre');
        $pedido->mensaje = request('personalizado');
        $pedido->telefono = request('telefono');
        $pedido->direccion = request('direccion');
        $pedido->estado = 1;
        $pedido->idPromocion = request('idPromocion');

        $pedido->save();

        return back()->with('mensaje', 'Su pedido fue enviado, nos comunicaremos contigo');
    }
}
