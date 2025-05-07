<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Panel</title>

    <link href="{{ asset('images/logo.png') }}" rel="icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" type="text/css" rel="stylesheet" />
    <!-- Theme style -->
    <link href="{{ asset('css/adminlte.min.css') }}" type="text/css" rel="stylesheet" />
    <!-- Mensajes Toast -->
    <link href="{{ asset('css/toastr.min.css') }}" type="text/css" rel="stylesheet" />
    @yield('content-admin-css')
</head>



<!-- para iniciar con el menu cerrado colocar
 <body class="sidebar-mini sidebar-closed sidebar-collapse" style="height: auto;">
 -->

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include("backend.menus.navbar")
    @include("backend.menus.sidebar")

    <div class="content-wrapper" style=" background-color: #fff;">
        <!-- redireccionamiento de vista -->

        <iframe style="width: 100%; resize: initial; overflow: hidden; min-height: 96vh" frameborder="0"  scrolling="" id="frameprincipal" src="{{ route($ruta) }}" name="frameprincipal">
        </iframe>

    </div>

    @include("backend.menus.footer")

</div>


<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/adminlte.min.js') }}" type="text/javascript"></script>


@yield('content-admin-js')

</body>
</html>
