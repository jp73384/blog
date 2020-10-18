@extends('layouts.plantilla')

@section('menu')
    <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpeg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h2>Blog angeles chapines</h2>
            <span class="subheading">Ubicados en San Antonio, Suchitepéquez</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
<div class="container">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="row">
      @foreach ($posts as $post)
      <div class="col-md-4">
        <img class="img-thumbnail mt-4" width="100%" src="{{asset('/storage/images/posts_images/'.$post['foto'])}}" alt="">
      </div>
      <div class="col-lg-8">
        <div class="post-preview">
          <a href="/home/{{$post['id']}}">
            <h2 class="post-title">
              {{$post['titulo']}}
            </h2>
            <h3 class="post-subtitle">
              {{$post['fecha']}}
            </h3>
          </a>
          <p class="post-meta">
            {!! getShorterString($post['descripcion'], 100)!!}
          </p>
        </div>
        <hr>
        <!-- Pager -->
      </div>
      @endforeach
    </div>
    
  {{$posts->links()}}
  </div>
</div>
  <hr>
@endsection