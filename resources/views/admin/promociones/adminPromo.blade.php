@extends('admin.plantilla.dashboard')
@section('content')
    <h4>Registrar promociones</h4>
    
        @if (session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
        @endif

        @if (session('mensajeEliminar'))
        <div class="alert alert-success">
            {{session('mensajeEliminar')}}
        </div>
        @endif
        
    
    <form action="{{route('ingresar')}} " method="post"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="categoria">Categoria: </label>
            <select name="categoria" id="categoria" class="form-control">
                <option value="">Seleciones una opcion</option>
                @foreach ($categoria as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->categoria }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="talla">Talla o tamaño: </label>
            <select name="talla" id="talla" class="form-control">
                <option value="">Seleciones una opcion</option>
                @foreach ($talla as $ta)
                    <option value=" {{$ta->id}}">{{ $ta->talla }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nombre">Precio: </label>
            <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio..." value="{{old('precio')}}">
        </div>
        <div class="form-group">
            <label for="mensaje">Mensaje: </label>
            <input type="text" name="mensaje" id="precio" class="form-control" placeholder="Mensaje..." value="{{old('mensaje')}}">
        </div>
        <div class="form-group">
            <label for="color">Color: </label>
            <select name="color" id="color" class="form-control">
                <option value="">Seleccione un color</option>
                <option value="Unico">Unico</option>
                <option value="Blanco">Blanco</option>
                <option value="Gris">Gris</option>
            </select>
        </div>
        <div class="form-group">
            <label for="estilo">Estilo: </label>
            <select name="estilo" id="estilo" class="form-control">
                <option value="">Selecione un estilo..</option>
                <option value="Ángel GT">Ángel GT</option>
                <option value="Ángel J-10">Ángel J-10</option>
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Imagen</label>
            <input type="file" name="foto" id="foto" class="form-control-file">
        </div>
        <div class="form-group">
            <input type="submit" id="boton" class="btn btn-primary">
        </div>
    </form>
@endsection