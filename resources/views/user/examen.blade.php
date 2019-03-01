@extends('layouts.app')

@section('content')
<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand topbar mb-4 static-top shadow">
		    <img src="{{ asset('imagenes/logo.png') }}" alt="">
        <!-- Topbar Navbar -->
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
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><strong style="color: #040404" class="caret">{{ Auth::user()->name }} <i class="fas fa-user-tie"></i></strong>
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
     <div class="container">
     	<h1>Examen {{ $examen->nombre }}</h1>
      @if(auth()->user()->id_tipoUsuario != 1)
      	@include('user.preguntas')
      @endif
      </div>
      <br><hr>

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; Your Website 2019</span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Seguro de que desea cerrar sesión?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Seleccione "Salir" si esta listo para cerrar sesión.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-primary" href="login.html">Salir</a>
      </div>
    </div>
  </div>
</div>

@endsection