<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Consulting & B-T</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet" type="text/css">

    </head>
    <body>
    <nav class="navbar navbar-expand navbar-dark topbar mb-4 static-top shadow" style="background: #4e73df;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
      <img src="{{ asset('imagenes/logop.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">Consulting & Business Training</a>

      <div class="collapse navbar-collapse float-right" style="margin-left: 60%;" id="navbarTogglerDemo03">
        
        <form class="form-inline my-2 my-lg-0 float-right">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0 float-right">
            @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link licks" href="{{ url('/home') }}">Inicio</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link links" href="{{ route('login') }}">Ingresar</a>
                </li>
                    @if (Route::has('register'))
                <li class="nav-item">
                        <a class="nav-link links" href="{{ route('register') }}">Registrarse</a>
                </li>
                    @endif
                @endauth
            @endif
          </ul>
        </form>
      </div>
    </nav>
    
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>

    <!--Scripts de bootstrap-ajax y jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
