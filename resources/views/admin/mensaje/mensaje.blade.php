@extends('admin.plantilla.dashboard')
@section('content')
<h2>Mensajes</h2>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Mensaje</th>
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
          </tr>
        @endforeach
    </tbody>
  </table>

@endsection