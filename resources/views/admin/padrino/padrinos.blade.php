@extends('admin.plantilla.dashboard')

@section('content')
    <h2>Registrar padrinos</h2>
    <form action="{{route('createPadrino')}}" method="post">
        {{ csrf_field() }}  
        <div class="form-group">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre..." value="{{old('nombre')}}">
        </div>
        <div class="form-group">
            <label for="telefono">Telefono: </label>
            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono..." value="{{old('telefono')}}">
        </div>
        <div class="form-group">
            <label for="fecha">Fecha: </label>
            <input type="date" name="fecha" id="fecha" class="form-control" placeholder="Nombre..." value="{{old('fecha')}}">
        </div>
        <div class="form-group">
            <input type="submit" value="Enviar" class="btn btn-primary">
        </div>
    </form>
@endsection