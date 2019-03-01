<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Consulting & B-T</title>

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts 
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Style para el diseño del index-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <!-- Style para la app-->
    
    <!-- Style para el plugin de las tablas-->
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/css/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/css/dataTables.bootstrap4.min.css') }}"/>



</head>
<body id="page-top">
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>

    <!--Scripts de bootstrap-ajax y jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

    <script type="text/javascript" src="{{ asset('js/welcome.js') }}"></script>
    <!-- plugin para las tablas 
    <script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>-->

    <!-- script para iniciar el plugin de la tabla -->
    <script type="text/javascript" src="{{ asset('DataTables/js/jquery.datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/js/datatables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>
</html>
