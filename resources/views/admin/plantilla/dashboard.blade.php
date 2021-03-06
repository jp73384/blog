<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Panel de administración</title>
        <link href="{{asset('/css/styles.css')}}" rel="stylesheet"/>
        <link rel="stylesheet" href="{{'/css/sb-admin-2.min.css'}}">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!--Para darle forma al texarea-->
        <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
        <script src="{{asset('/js/mostrar.js')}}"></script>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Angeles Chapines</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                
             </form>
            <!-- Navbar-->

            @php
                $contador = 0;
            @endphp
            @foreach (session('key') as $item)
            @php
                $contador = $contador+1;
            @endphp
            @endforeach

            <!-- Nav Item - Alerts -->
            
            <ul class="navbar-nav ml-auto ml-md-0">
                <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bell fa-fw"></i>
                  <!-- Counter - Alerts -->
                  
                  <span class="badge badge-danger badge-counter">
                      @if ($contador>9)
                          9+
                        @else
                        {{$contador}}
                      @endif
                  </span>
                  
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                    Nuevos mensajes
                  </h6>
                  @foreach (session('key') as $mensaje)
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('verMensaje', $mensaje->id)}}">
                    <div class="mr-3">
                      <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                      </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">{{$mensaje->created_at}}</div>
                        <span class="font-weight-bold">{{$mensaje->mensaje}}</span>
                    </div>
                  </a>
                  @endforeach
                  
                  <a class="dropdown-item text-center small text-gray-500" href="{{route('mensaje')}}">Ver todo el historial de mensajes</a>
                </div>
              </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> {{ __('Cerrar sesion') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form> 
                    </div>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Lista de opciones</div>
                            <a class="nav-link" href="{{route('postIndex')}}">
                                <div class="sb-nav-link-icon"><i class="fa fa-envelope"></i></div>
                                Gestionar POST
                            </a>
                            <!--div class="sb-sidenav-menu-heading">Padrinos</div-->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                                Padrinos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('padrino')}}"><i class="fa fa-user-plus"></i>&nbsp;Registrar Padrinos</a>
                                    <a class="nav-link" href="{{route('listadoPadrino')}}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Listado</a>
                                </nav>
                            </div>
                            <!--div class="sb-sidenav-menu-heading">Benefiados</div-->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#apadrinado" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-address-card" aria-hidden="true"></i></div>
                                Beneficiados
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="apadrinado" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('apdrinar')}}"><i class="fa fa-user-plus"></i>&nbsp;Apadrinar</a>
                                    <a class="nav-link" href="{{route('lista')}}"><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Listado apadrinados</a>
                                </nav>
                            </div>

                            <!--div class="sb-sidenav-menu-heading">Promociones</div-->
                            <a class="nav-link" href="{{ route('registrar') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div>
                                Promociones
                            </a>
                            <a class="nav-link" href="{{ route('listadoPromociones') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-gift"></i></div>
                                Gestionar promociones
                            </a>
                            <a class="nav-link" href="{{route('atender')}}">
                                <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart"></i></div>
                                Pedidos
                            </a>
                            <a class="nav-link" href="{{route('historial')}}">
                                <div class="sb-nav-link-icon"><i class="fa fa-history"></i></div>
                                Historial de ventas
                            </a>
                        </div>
                    </div>
                </nav> 
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">

                        @yield('content')

                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Ingeniería en sistemas promocion 2016 - 2020</div>
                            <div>
                                <a href="#">Politicas de privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/js/admin/demo/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="/js/admin/demo/chart-area-demo.js"></script>
        <script src="/js/admin/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="/js/admin/demo/datatables-demo.js"></script>
        @yield('js_post_page')
    </body>
</html>

