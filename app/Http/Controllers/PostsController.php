<?php

namespace App\Http\Controllers;

use App\Post;
use App\Apadrinado;
use Illuminate\Http\Request;

class PostsController extends Controller
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
        $posts = Post::all();

        return view('admin.posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //validar el formulario
        $data  = request()->validate([
            'title' => 'required|max:255',
            'image' => 'required|image',
            'date' => 'required',
            'post_content' => 'required'
        ]);

        //Obtener nombre de la imagen
        $fileNameWithTheExtension = request('image')->getClientOriginalName();

        //nombre de la imagen
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);

        //extension de la imagen
        $extesion = request('image')->getClientOriginalExtension();
        
        //nuevo nombe de la imagen
        $NewFileName = $fileName.'_'.time().'.'.$extesion;

        $path = request('image')->storeAs('public/images/posts_images', $NewFileName);

        //para saber el usuario
        $user = auth()->user();
        
        //insertar post
        $post = new Post();
        $post->titulo = request('title');
        $post->descripcion = request('post_content');
        $post->fecha = request('date');
        $post->foto = $NewFileName;
        $post->idUser = $user->id;
        
        $post->save(); //10.08-Curso de Laravel 6.0 - Crear el CRUD para Post - Upload Image para Post

        return redirect('post');

    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = Post::find($post->id);

        return view('admin/posts/edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //Obtener nombre de la imagen

        //if (!is_null(request('image')->getClientOriginalName() )) {     
        

        $fileNameWithTheExtension = request('image')->getClientOriginalName();

        //nombre de la imagen
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);

        //extension de la imagen
        $extesion = request('image')->getClientOriginalExtension();
        
        //nuevo nombe de la imagen
        $NewFileName = $fileName.'_'.time().'.'.$extesion;

        $path = request('image')->storeAs('public/images/posts_images', $NewFileName);
        
        $oldImage = public_path()."/storage/images/posts_images/".$post->foto;

        

        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        //insertar post
        $post = Post::findOrFail($post->id);

        $post->titulo = request('title');
        $post->descripcion = request('post_content');
        $post->fecha = request('date');
        $post->foto = $NewFileName;
        
        $post->save(); //10.08-Curso de Laravel 6.0 - Crear el CRUD para Post - Upload Image para Post
    //}

        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $post = Post::find($request->post_id);

        //borrar imagen
        $oldImage = public_path()."/storage/images/posts_images/".$post->foto;

    
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        $post->delete();

        return redirect('/post');
    }
}
