@extends('layouts.plantilla')

@section('menu')

    <header class="masthead" style="background-image: url('{{asset('/storage/images/posts_images/'.$post['foto'])}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>{{$post['titulo']}}</h1>
                        <span class="subheading">By {{$post->user['email']}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>{!!$post['descripcion']!!}</p>
            </div>
        </div>
    </div>
    <hr>
@endsection