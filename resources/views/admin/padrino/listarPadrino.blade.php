@extends('admin.plantilla.dashboard')
@section('content')

<h2>Padrinos que apoyan a la asociación Angeles Chapines</h2>
@if (session('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}}</div>
@endif
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
                                    <form action="{{route('eliminarPadrino', $padrino->id)}}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-link" type="submit"> <i class="fa fa-trash"></i> </button>
                                        </button>
                                    </form>
                                </td>
                            </tr>     
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection