@extends('admin.plantilla.dashboard')
@section('content')
    <h4>Editar</h4>

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif
    <form action="{{route('actualizarPromo', $promocion->id)}} " method="post"  enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="categoria">Categoria: </label>
            <select name="categoria" id="categoria" class="form-control">
                <option value="{{$idCategoria->id}}">Actualmente seleccionado {{$idCategoria->categoria}}</option>
                @foreach ($categoria as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->categoria }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="talla">Talla o tamaño: </label>
            <select name="talla" id="talla" class="form-control">
                <option value="{{$idTalla->id}}">actualmente tiene seleccionado {{$idTalla->talla}} </option>
                @foreach ($talla as $ta)
                    <option value=" {{$ta->id}}">{{ $ta->talla }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nombre">Precio: </label>
            <input type="text" name="precio" id="precio" class="form-control" value="{{$promocion->precio}}">
        </div>
        <div class="form-group">
            <label for="mensaje">Mensaje: </label>
            <input type="text" name="mensaje" id="precio" class="form-control" value="{{$promocion->mensaje}}">
        </div>
        <div class="form-group">
            <label for="color">Color: </label>
            <select name="color" id="" class="form-control">
                <option value="{{$promocion->colors}}">Actualmente color seleccionado {{$promocion->colors}}</option>
                <option value="Unico">Unico</option>
                <option value="Blanco">Blanco</option>
                <option value="Gris">Gris</option>
            </select>
        </div>
        <div class="form-group">
            <label for="estilo">Estilo: </label>
            <select name="estilo" id="estilo" class="form-control">
                <option value="{{$promocion->estilo}}">Actualmente tiene {{$promocion->estilo}}</option>
                <option value="Angel GT">Ángel GT</option>
                <option value="Angel J-10">Ángel J-10</option>
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" class="form-control">{{$promocion->descripcion}}</textarea>
        </div>
        <div class="form-group">
            <label for="foto">Imagen</label>
            <input type="file" name="foto" id="foto" class="form-control-file">
        </div>
        <div class="form-group">
            <img src="{{asset('/storage/images/promociones/'.$promocion->foto)}}" width="100" alt="">
        </div>
        <div class="form-group">
            <input type="submit" id="boton" class="btn btn-primary">
        </div>
    </form>

@endsection