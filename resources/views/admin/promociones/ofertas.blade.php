@extends('admin.plantilla.promo')
@section('promocion')
        <div class="form-control"></div>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Promociones</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>

                @if (session('mensaje'))
                    <div class="alert alert-success">
                        {{session('mensaje')}}
                    </div>                    
                @endif

                <!-- Portfolio Grid Items-->
                <div class="row">
                    @foreach ($ofertas as $item)
                        <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal">
                            
                            <img class="img-fluid" src="{{asset('/storage/images/promociones/'.$item->foto)}}" alt="" />
                            <strong>Precio:</strong> Q{{$item->precio}}.00<br>
                            <strong>Mensaje:</strong> {{$item->mensaje}}<br>
                            <strong>Color:</strong> {{$item->colors}}<br>
                            <strong>Estilo:</strong> {{$item->estilo}}<br>
                            <strong>Descripcion:</strong> {{$item->descripcion}}<br>
                            @if ($item->check == 't')
                                <strong>Talla:</strong> {{$item->talla}}<br>
                            @else
                                <strong>Tamaño: </strong> {{$item->talla}}<br>
                            @endif
                            
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$item->idPromo}}">Solicitar</a>

                            <div class="modal fade" id="exampleModal{{$item->idPromo}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">LLena los siguientes campos</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{route('pedidos')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="idPromocion" value="{{$item->idPromo}}" hidden>
                                          <input type="text" name="nombre" class="form-control" placeholder="INGRESE SU NOMBRE">
                                        </div>
                                        <div class="form-group">
                                          <input type="text" name="telefono" class="form-control" placeholder="INGRESE SU TELEFONO">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="direccion" class="form-control" placeholder="INGRESE SU DIRECCION">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <input type="submit" class="btn btn-primary" value="Enviar">
                                          </div>
                                      </form>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>

                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </section>

@endsection
       