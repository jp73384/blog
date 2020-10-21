@extends('admin.plantilla.dashboard')

@section('content')

<form action="{{route('editarPadrinos', $editar->id)}}" method="post">
    @method('PUT')
    {{ csrf_field() }}  
    <div class="form-group">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$editar->nombre}}">
    </div>
    <div class="form-group">
        <label for="telefono">Telefono: </label>
        <input type="text" name="telefono" id="telefono" class="form-control" value="{{$editar->telefono}}">
    </div>
    <div class="form-group">
        <label for="fecha">Fecha: </label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{$editar->fecha}}">
    </div>
    <div class="form-group">
        <input type="submit" value="Enviar" class="btn btn-primary">
    </div>
</form>
    
@endsection