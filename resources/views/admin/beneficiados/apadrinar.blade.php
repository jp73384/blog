@extends('admin.plantilla.dashboard')
@section('content')
    <h3 class="">Apadrinar</h3>
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif
    <form action="{{route('save')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre..." value="{{old('nombre')}}">
        </div>
        <div class="form-group alert alert-warning" id="dpi_f">
            <label for="dpi">DPI: </label>
            <input type="text" name="dpi" id="dpi" class="form-control" placeholder="DPI..." value="{{old('dpi')}}">
        </div>
        <div class="form-group" id="">
            <label for="fecha">Fecha de Nacimiento: </label>
            <input type="date" name="fecha" id="fecha" class="form-control" placeholder="Fecha nacimiento..." value="{{old('fecha')}}">
        </div>
        <div class="form-group" id="">
            <label for="edad">Edad: </label>
            <input type="text" name="edad" id="edad" class="form-control" placeholder="Fecha nacimiento..." value="{{old('edad')}}">
        </div>
        <div class="form-group">
            <label for="direccion">Direccion: </label>
            <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion..." value="{{old('direccion')}}">
        </div>
        <div class="form-group">
            <label for="telefono">Telefono: </label>
            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono..." value="{{old('telefono')}}">
        </div>
        
        <div class="form-group">
            <label for="tipo">Tipo ayuda:</label>
            <select name="tipoAyuda" id="tipo" class="form-control">
                <option value="">Selecciones un opcion</option>
                @foreach ($ayuda as $item)
                    <option value="{{$item->id}}">{{$item->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="apadrinado">Padrinos:</label>
            <select name="apadrinado" id="apadrinado" class="form-control">
                <option value="">Selecciones un opcion</option>
                @foreach ($apadrinado as $padrino)
                    <option value="{{$padrino->id}}">{{$padrino->nombre}}</option>
                @endforeach
            </select>
        </div>   
        <div class="form-group">
            <input type="submit" value="Enviar" class="btn btn-primary">
        </div>
    </form>
@endsection