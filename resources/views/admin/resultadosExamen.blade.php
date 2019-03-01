@extends('layouts.app')

@section('content')
<!-- Page Wrapper -->
<div id="wrapper">
@if(auth()->user()->id_tipoUsuario == 1)
  <!-- Sidebar -->
    @include('admin.menu')
  <!-- End of Sidebar -->
  @endif

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-dark topbar mb-4 static-top shadow"  @if(auth()->user()->id_tipoUsuario != 1) style="background: #4e73df;" @endif>

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
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><strong class="caret" @if(auth()->user()->id_tipoUsuario != 1) style="color: #fff"@else style="color: #000"  @endif >{{ Auth::user()->name }} <i class="fas fa-user-tie"></i></strong>
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
        <strong><h3>Calificaciones de: {{$usuario->name}}</h3></strong>
        <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <!--<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">-->
                <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Examen</th>
                                <th>Calificación</th>
                                <th>Aciertos</th>
                                <th>Errores</th>
                                <th>Descargar</th>
                            </tr>
                        </thead>
                        <tbody>@forelse($consulta as $con)
                            <tr>
                                <td>{{ $con->nombre }}</td>
                                <td>{{ $con->resultado }}</td>
                                <td>{{ $con->aciertos }}</td>
                                <td>{{ $con->errores }}</td>
                                <td>
                                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Examen</a>
                                </td>
                                @empty
                                <h2>Aún no existen registros</h2>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
              </div>
            </div>
        </div>
      </div>
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

@endsection
