@extends('admin.plantilla.dashboard')
@section('content')
<table class="table-responsive table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Telefono</th>
        <th scope="col">Mensaje</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th>{{$mensajes->id}}</th>
            <th>{{$mensajes->nombre}}</th>
            <th>{{$mensajes->correo}}</th>
            <th>{{$mensajes->telefono}}</th>
            <th>{{$mensajes->mensaje}}</th>
            <td>
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$mensajes->id}}">Atender Solicitud</a>

                    <div class="modal fade" id="exampleModal{{$mensajes->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Mensajes</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{route('atender_mensaje', $mensajes->id)}}" method="POST">
                              @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="">Precione confirmar para atender este mensaje</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <input type="submit" class="btn btn-primary" value="Confirmar">
                                  </div>
                              </form>
                            </div>
                            
                          </div>
                        </div>
                      </div>

                    </div>
            </td>
          </tr>
    </tbody>
  </table>
@endsection