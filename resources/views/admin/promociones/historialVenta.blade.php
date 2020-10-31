@extends('admin.plantilla.dashboard')
@section('content')
<h4>Historial de venta</h4>
<div>
    <table class="table table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Categoria</th>
            <th scope="col">Precio</th>
            <th scope="col">Color</th>
            <th scope="col">Estilo</th>
            <th scope="col">Foto</th>
            <th scope="col">Talla/Tamaño</th>
            <th scope="col">Nombre Cliente</th>
            <th scope="col">Mensaje de personalización</th>
            <th scope="col">Telefono</th>
            <th scope="col">Direccion cliente</th>
            <th scope="col">Estado del productos</th>
          </tr> 
        </thead>
        <tbody>
          
            @foreach ($pedido as $item)
            <tr>
                <th scope="row">{{$item->pedido}}</th>
                <td>{{$item->categoria}}</td>
                <td>{{$item->precio}}</td>
                <td>{{$item->colors}}</td>
                <td>{{$item->estilo}}</td>
                <td>
                    <img src="{{asset('/storage/images/promociones/'.$item->foto)}}" width="100" alt="">
                </td>
                <td>{{$item->talla}}</td>
                <td>{{$item->nombre}}</td>
                <td>{{$item->personalizado}}</td>
                <td>{{$item->telefono}}</td>
                <td>{{$item->direccion}}</td>
                   @if ($item->estado == '1')
                   <td> <a href="#" class="btn btn-danger">Pendiente</a> </td>
                   <!--td><i class="fa fa-times" aria-hidden="true"></i></td-->
                    @else
                    <td> <a href="#" class="btn btn-success">Vendido</a> </td>

                    <!--td><i class="fa fa-check" aria-hidden="true"></i></td-->
                   @endif
              </tr>
            

            @endforeach
          
        </tbody>
      </table>
</div>
@endsection