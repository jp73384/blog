<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Contactano;

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

    public function promociones()
    {
        return view('promociones');
    }
}
