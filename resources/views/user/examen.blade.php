@extends('layouts.app')

@section('content')
<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- End of Topbar -->
     <div class="container">
        <div class="row card-header">
            <div class="col-xl-8">
              <h1>Examen: {{ $examen->nombre }}</h1>
              <input id="horas" type="text" value="{{ $horas }}" hidden>
              <input id="minutos" type="text" value="{{ $minutos }}" hidden>
              <input id="segundos" type="text" value="{{ $segundos }}" hidden>
            </div>
            <div class="col-xl-4">
              <div class="row float-right">
                <figure class="figure">
                  <button class="btn btn-primary" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    <div class="container">
                      <div class="row">
                          <h5 class="tiempo">Tiempo: </h5><h5 id="Horas">00</h5><h5 id="Minutos">:00</h5><h5 id="Segundos">:00</h5><h5 id="Centesimas" hidden>:00</h5>
                      </div>
                    </div>
                  </button>
                  <figcaption class="figure-caption text-right">
                    <p>Tiempo limite: {{ $examen->tiempo }}</p>
                  </figcaption>
                </figure>
              </div>
            </div>
        </div>      
        @if(auth()->user()->id_tipoUsuario != 1)
        	@include('user.preguntas')
        @endif
     </div>
      <br><hr>

    </div>
    <!-- End of Main Content -->

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