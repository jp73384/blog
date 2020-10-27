<h2>Listado de Padrinos activos</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Codigo. </th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($listadoPadrino as $padrino)
                <tr>
                    <td>{{$padrino['id']}}</td>
                    <td>{{$padrino['nombre']}}</td>
                    <td>{{$padrino['telefono']}}</td>
                    <td>{{$padrino['fecha']}}</td>
                </tr>     
            @endforeach
    </tbody>
</table>