@extends('admin.plantilla.dashboard')
@section('content')
    <h4>Listado de promociones</h4>

    @if (session('mensajeEliminar'))
        <div class="alert alert-success">
          {{session('mensajeEliminar')}}
        </div>
    @endif

        <table class="table table-sm table table-bordered">
            <thead>
              <tr align="center">
                <th scope="col">#</th>
                <th scope="col">Categoria</th>
                <th scope="col">Talla / Tamaño</th>
                <th scope="col">Precio</th>
                <th scope="col">Mensaje</th>
                <th scope="col">Color</th>
                <th scope="col">Estilo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Foto articulo</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($ofertas as $item)
              <tr>
                <th scope="row">{{$item->idPro}}</th>
                <td>{{$item->categoria}}</td>
                <td>{{$item->talla}}</td>
                <td>Q {{$item->precio}}.00</td>
                <td>{{$item->mensaje}}</td>
                <td>{{$item->colors}}</td>
                <td>{{$item->estilo}}</td>
                <td align="justify">{{$item->descripcion}}</td>
                <td>
                    <img src="{{asset('/storage/images/promociones/'.$item->foto)}}" width="100" alt="">
                </td>
                <td align="center">
                    <a href="{{route('editarPromo', $item->idPro)}}"><i class="fa fa-edit"></i></a>
                    <a href="#" data-toggle="modal" data-target="#Relacion{{$item->idPro}}" data-postid="{{$item->idPro}}"><i class="fas fa-trash-alt"></i></a>

                    <div class="modal fade" id="Relacion{{$item->idPro}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Titulo</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="close">
                                      <span aria-hidden="true">x</span>
                                  </button>
                              </div>
                              <div class="modal-body">¿Esta seguro que desea eliminar?</div>
                              <div class="modal-footer">
                                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                  
                                      <form action="{{route('eliminarPromo', $item->idPro)}}" method="post">
                                          @method('DELETE')
                                          @csrf
                                          <input type="submit" value="Borrar" class="btn btn-primary">
                                      </form>
                                  
                              </div>
                          </div>
                      </div>
                  </div>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
 

@endsection