@extends('admin.plantilla.dashboard')
@section('content')

@if (session('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}}</div>
@endif
<div class="container m4">
    <h2>Padrinos que apoyan a la organización</h2>
    <a href="{{route('descargar')}}" class="btn btn-warning"> <i class="fa fa-file-pdf"></i> Descargar Reporte</a>
    <a href="{{route('excel_padrino')}}" class="btn btn-warning"> <i class="fa fa-file-excel"></i> Descargar Reporte</a>
    
</div>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Listado de padrinos 
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Codigo. </th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Codigo. </th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                        @foreach ($listadoPadrino as $padrino)
                            <tr>
                                <td>{{$padrino['id']}}</td>
                                <td>{{$padrino['nombre']}}</td>
                                <td>{{$padrino['telefono']}}</td>
                                <td>{{$padrino['fecha']}}</td>
                                <td align="center">
                                    <a href="{{route('editar', $padrino->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#Relacion{{$padrino->id}}" data-postid="{{$padrino->id}}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>

                                    <div class="modal fade" id="Relacion{{$padrino->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Titulo</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="close">
                                                        <span aria-hidden="true">x</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">¿Esta seguro que desea eliminar al padrino {{$padrino->nombre}}?</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                    @if(isset($padrino->id))
                                                        <form action="{{route('eliminarPadrino', $padrino->id)}}" method="post">
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
</div>
@endsection

