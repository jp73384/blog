@extends('admin.plantilla.dashboard')
@section('content')
    <h4>Pedidos en espera</h4>
    @if (session('mensaje'))
        <div class="alert alert-success">
          {{session('mensaje')}}
        </div>
    @endif
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
                <th scope="col">Atender Compra</th>
              </tr> 
            </thead>
            <tbody>
              
                @foreach ($pedido as $item)
                
                @if ($item->estado == '1')
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
                    <td>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$item->pedido}}">Despachar</a>

                            <div class="modal fade" id="exampleModal{{$item->pedido}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">LLena los siguientes campos</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{route('vender', $item->pedido)}}" method="POST">
                                      @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Esta a punto de antender esta compra, precione confirmar para completar la venta</label>
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
                @endif

                @endforeach
              
            </tbody>
          </table>
    </div>
@endsection