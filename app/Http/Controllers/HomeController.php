<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Contactano;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

        $comment->save();

        return back()->with('mensaje',' ');
    }
}
