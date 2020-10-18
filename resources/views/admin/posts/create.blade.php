@extends('admin.plantilla.dashboard')


@section('content')
    <h2>Crear un nuevo post</h2>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('insertarPost')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Titulo..." value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="image">Seleccionar imagen</label>
            <input type="file" name="image" id="image" class="form-control-file" value="{{old('image')}}">
        </div>
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Insertar descripcion</label>
            <textarea name="post_content" id="content">{{old('post_content')}}</textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Enviar" class="btn btn-primary">
        </div>
    </form>
    <script>
        CKEDITOR.replace('post_content');
    </script>
@endsection
