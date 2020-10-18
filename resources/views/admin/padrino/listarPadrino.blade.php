@extends('admin.plantilla.dashboard')
@section('content')

<h2>Padrinos que apoyan a la asociación Angeles Chapines</h2>

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
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Codigo. </th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Fecha</th>
                    </tr>
                </tfoot>
                <tbody>
                        @foreach ($listadoPadrino as $padrino)
                            <tr>
                                <td>{{$padrino['idPadrinos']}}</td>
                                <td>{{$padrino['nombre']}}</td>
                                <td>{{$padrino['telefono']}}</td>
                                <td>{{$padrino['fecha']}}</td>
                            </tr>     
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection