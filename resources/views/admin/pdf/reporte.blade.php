<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    
    <div class="container">
        <img class="mt-4" src="https://scontent.fgua3-1.fna.fbcdn.net/v/t1.0-9/82581697_2541646466081698_8061475004082028544_n.jpg?_nc_cat=106&_nc_sid=09cbfe&_nc_ohc=RHbnUIZHPFEAX__bfwq&_nc_ht=scontent.fgua3-1.fna&oh=cd32ef876427aa606ddd0f9e4d61b8bd&oe=5FB42BFB" width="100" alt="">
        <h3 align="center">Listado de Padrinos que ayudan a la organización</h3>
        <a href="{{route('descargar')}}" class="btn btn-success"> <i class="fa fa-file-pdf-o"></i> Descargar</a>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Cod.</th>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fecha inicio</th>
              </tr>
            </thead>
            <tbody>
              
                  @foreach ($reporte as $item)
                  <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td> {{ $item->nombre }} </td>
                    <td>{{ $item->telefono }}</td>
                    <td>{{ $item->fecha }}</td>
                  </tr>
                  @endforeach
            </tbody>
          </table>
          
    </div>

    {{ $reporte->links() }}

</body>