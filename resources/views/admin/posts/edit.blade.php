@extends('admin.plantilla.dashboard')


@section('content')
    <h2>Actualización de Post</h2>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/post/{{$post['id']}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Titulo..." value="{{$post['titulo']}}">
        </div>
        <div class="form-group">
            <label for="image">Seleccionar imagen</label>
            <input type="file" name="image" id="image" class="form-control-file" value="{{$post['foto']}}">
        </div>
        <div class="form-group">
            <img src="{{asset('/storage/images/posts_images/'.$post['foto'])}}" alt="{{$post['foto']}}" width="100">
        </div>
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" value="{{$post['fecha']}}">
        </div>
        <div class="form-group">
            <label for="content">Insertar descripcion</label>
            <textarea name="post_content" id="content">{{$post['descripcion']}}</textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Enviar" class="btn btn-primary">
        </div>
    </form>
    <script>
        CKEDITOR.replace('post_content');
    </script>
@endsection
