<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<h2>Reporte de apadrinados</h2>

<table>
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
    </thead>
    <tbody>
        @foreach ($lista as $apadrino)
        <tr>
            <td>{{$apadrino->idApa}}</td>
            <td>{{$apadrino->nombre}}</td>
            <td>{{$apadrino->nacimiento}}</td>
            <td>{{$apadrino->edad}} años</td>
            <td>{{$apadrino->dpi}}</td>
            <td>{{$apadrino->direccion}}</td>
            <td>{{$apadrino->telefono}}</td>
            <td>{{$apadrino->descripcion}}</td>
            <td>{{$apadrino->nom}}</td>
        </tr>
        @endforeach
    </tbody>
</table>