<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Angeles chapines</title>

  <!-- Scripts -->
  <script src="{{ asset('/js/app.js') }}" defer></script>

  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!--nav-->
  @if (!\Request::is('login') && !\Request::is('register'))
    @include('parte.nav')    
  @endif

  @yield('menu')

  <!--Footer-->

  @if (!\Request::is('login') && !\Request::is('register'))
    @include('parte.footer')    
  @endif

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/js/clean-blog.min.js"></script>

</body>

</html>
