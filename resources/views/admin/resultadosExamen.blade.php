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
        <strong><h3>Calificaciones de: <span style="color: #000;">{{$usuario->name}}</span></h3></strong>
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

  </div>
  <!-- End of Content Wrapper -->

</div><br>
<!-- End of Page Wrapper -->

@endsection
