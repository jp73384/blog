@extends('admin.plantilla.dashboard')
@section('content')

    <h2>Listado de los apadrinados</h2>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="alert alert-warning">
                            <th>Cod.</th>
                            <th>Nombre</th>
                            <th>Fecha de nacimiento</th>
                            <th>Edad</th>
                            <th>DPI</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Ayuda que se le brinda</th>
                            <th>Padrino</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($lista as $apadrino)
                                <tr>
                                    <td>{{$apadrino->id}}</td>
                                    <td>{{$apadrino->nombre}}</td>
                                    <td>{{$apadrino->nacimiento}}</td>
                                    <td>{{$apadrino->edad}} años</td>
                                    <td>{{$apadrino->dpi}}</td>
                                    <td>{{$apadrino->direccion}}</td>
                                    <td>{{$apadrino->telefono}}</td>
                                    <td>{{$apadrino->ayuda->descripcion}}</td>
                                    <td>{{$apadrino->aaa->nombre}}</td>
                                    <td align="center">
                                        <a href="{{route('editar', $apadrino->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#Relacion{{$apadrino->id}}" data-postid="{{$apadrino->id}}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
    
                                        <div class="modal fade" id="Relacion{{$apadrino->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Titulo</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="close">
                                                            <span aria-hidden="true">x</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">¿Esta seguro que desea eliminar al padrino {{$apadrino->nombre}}?</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                        @if(isset($padrino->id))
                                                            <form action="{{route('eliminarPadrino', $apadrino->id)}}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary">Borrar</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                    </td>
                                </tr>     
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>



@endsection