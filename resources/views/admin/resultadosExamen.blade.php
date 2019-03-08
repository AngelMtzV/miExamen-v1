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
          
        <div class="row">
          <div class="col-md-12">
            <a class="btn btn-primary col-md-12" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Información  <i class="fas fa-plus-circle"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
              <div class="card card-body">
                <!--Informacion-->
                <div class="card text-center">
                  <div class="card-header">
                    <h1>información de <strong>{{$usuario->usuario}}</strong></h1>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Datos</h5>
                    <div class="row">
                      <div class="col">
                        <p class="card-text">ID: <strong style="color: #000;">{{$usuario->id}}</strong></p>
                        <p class="card-text">Nombre: <strong style="color: #000;">{{$usuario->name}}</strong></p>
                        <p class="card-text">Usuario: <strong style="color: #000;">{{$usuario->usuario}}</strong></p>
                        <p class="card-text">Correo electrónico: <strong style="color: #000;">{{$usuario->email}}</strong></p>
                        <p class="card-text">Telefono: <strong style="color: #000;">{{$usuario->telefono}}</strong></p>
                        <p class="card-text">Celular: <strong style="color: #000;">{{$usuario->celular}}</strong></p>
                      </div>
                      <div class="col">
                        <p class="card-text">Estado: <strong style="color: #000;">{{$usuario->estado}}</strong></p>
                        <p class="card-text">Esatdo civil: <strong style="color: #000;">{{$usuario->estado_civil}}</strong></p>
                        <p class="card-text">Profesión: <strong style="color: #000;">{{$usuario->profesion}}</strong></p>
                        <p class="card-text">Genero: <strong style="color: #000;">{{$usuario->genero}}</strong></p>
                        <p class="card-text">Fecha de nacimiento: <strong style="color: #000;">{{$usuario->fecha_nacimiento}}</strong></p>
                        <p class="card-text">Tipo de usuario: <strong style="color: #000;">{{ $usuario->id_tipoUsuario == 1 ? 'Administrador' : 'Practicante' }}</strong></p>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-muted">
                    <h4>Examenes contestados: </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><br>

        <strong><h3>Calificaciones de: <span style="color: #000;">{{$usuario->usuario}}</span></h3></strong>
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
                                  <a href="{{ route('examenesAdmin.edit', $con->id_examen) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Examen</a>
                                </td>
                                @empty
                                <h4 class="alert alert-danger"><i class="fas fa-info-circle"></i> El usuario no ha realizado ningún examen</h4>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
              </div>
            </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">
            <a class="btn btn-primary col-md-12" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Examen  <i class="fas fa-plus-circle"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
              <div class="card card-body">
                <!--Informacion-->
                <div class="card text-center">
                  <div class="card-header">
                    <h1>información de <strong>{{$usuario->usuario}}</strong></h1>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Datos</h5>
                  </div>
                  <div class="card-footer text-muted">
                    <h4>Examenes contestados: </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><br>
      </div>
    </div>
    <!-- End of Main Content -->

  </div>
  <!-- End of Content Wrapper -->

</div><br>
<!-- End of Page Wrapper -->

@endsection
