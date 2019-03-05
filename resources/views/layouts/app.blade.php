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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}"/>
    <style>
      .reloj{
       float: left;
       font-size: 80px;
       font-family: Courier,sans-serif;
       color: #black;
      }
      .boton{
       outline: none;
       border: 0px solid #363431;
       color: white;
       width: 128px;
       height: 30px;
       font-size: 20px;
       border-radius: 5px;
       font-family: Helvetica;
       cursor: pointer;
      }
      .boton:active{
       box-shadow: 0px 0px 14px green;
       color: green;
      }
      .boton:hover{
       box-shadow: 0px 0px 14px orange;
       color: orange;
      }
    </style>

</head>
<body id="page-top" >
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Si quiero menu lateral ponerlo aquí -->

      <!-- Si quiero menu lateral ponerlo aquí -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-dark topbar mb-4 static-top shadow" style="background: #29292A;">
            <!-- Topbar Navbar -->
            <ul class="navbar">
              <img src="{{ asset('imagenes/logo.png') }}" alt="">
            </ul>
            <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
              <div class="collapse navbar-collapse" id="navbarSupportedContent">

                  <!-- Right Side Of Navbar -->
                  <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                          @endif
                      @else
                          <li class="nav-item dropdown no-arrow">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><strong class="caret" style="color: #fff">{{ Auth::user()->name }} <i class="fas fa-user-tie"></i></strong>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }} "
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();" style="color: #FD0505">
                                      {{ __('Cerrar sesión  ') }}<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                  </ul>
              </div>
            </ul>

          </nav>
          <!-- End of Topbar -->
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>

    
        <!-- Footer -->
        <footer class="sticky-footer bg-dark" style="margin-top: 90%;">
          <div class="container my-auto" >
            <div class="copyright text-center my-auto">
              <span style="color: #fff;">Copyright &copy; Your Website 2019</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!--Scripts de bootstrap-ajax y jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

    <script type="text/javascript" src="{{ asset('js/welcome.js') }}"></script>
    <script src="{{asset('js/Cronometro.js')}}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
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
    <script>
      var tiempo = $('#hr').val();
      var centesimas = 0;
      var segundos = 0;
      var minutos = 0;
      var horas = 0;
      if ( (centesimas == 0)&&(segundos == 0)&&(minutos == 1) ) {
        clearInterval(control);
        alert("tu tiempo se agoto.")
      }

      function inicio () {
       control = setInterval(cronometro,10);
       document.getElementById("inicio").disabled = true;
      }
      function cronometro () {
       if (centesimas < 99) {
        centesimas++;
        if (centesimas < 10) { centesimas = "0"+centesimas }
        Centesimas.innerHTML = ":"+centesimas;
       }
       if (centesimas == 99) {
        centesimas = -1;
       }
       if (centesimas == 0) {
        segundos ++;
        if (segundos < 10) { segundos = "0"+segundos }
        Segundos.innerHTML = ":"+segundos;
       }
       if (segundos == 59) {
        segundos = -1;
       }
       if ( (centesimas == 0)&&(segundos == 0) ) {
        minutos++;
        if (minutos < 10) { minutos = "0"+minutos }
        Minutos.innerHTML = ":"+minutos;
       }
       if (minutos == 59) {
        minutos = -1;
       }
       if ( (centesimas == 0)&&(segundos == 0)&&(minutos == 0) ) {
        horas ++;
        if (horas < 10) { horas = "0"+horas }
        Horas.innerHTML = horas;
       }
      }
    </script>
</body>
</html>
