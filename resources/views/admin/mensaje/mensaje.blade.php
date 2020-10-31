@extends('admin.plantilla.dashboard')
@section('content')
<h2>Nuevos mensajes</h2>

<table class="table-responsive table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Mensaje</th>
        <th scope="col">Estado del mensaje</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($mensaje as $item)
        <tr>
            <th>{{$item->id}}</th>
            <th>{{$item->nombre}}</th>
            <th>{{$item->correo}}</th>
            <th>{{$item->telefono}}</th>
            <th>{{$item->mensaje}}</th>
            @if ($item->estado == '1')
            <th>
              <a href="#" class="btn btn-success">Pediente</a>
              
            </th>
            @else
            <th>
              <a href="#" class="btn btn-danger">Antendido</a>
            </th>
            @endif
            
          </tr>
        @endforeach
    </tbody>
  </table>

@endsection