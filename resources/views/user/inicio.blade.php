<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
    <div class="col-md-12">
        <div>
          <h4><strong>¡¡Bienvenido {{ auth()->user()->id_tipoUsuario == 1 ? 'Administrador' : auth()->user()->name }}!!</strong></h4>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>

  <!-- Content Row -->

  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <!-- Card Header - Dropdown -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado de Examenes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!--<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">-->
                <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>@forelse($Allexamenes as $examen)
                            <tr>
                                <td>{{ $examen->nombre }}</td>
                                <td>{{ $examen->descripcion }}</td>
                                <td>
                                  @if($examen->id_estado == 1)
                                  <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" data-toggle="modal" data-target="#modalP-{{ $examen->id }}"><i class="far fa-clock"></i>  Pendiente</button>
                                  @endif
                                  @if($examen->id_estado == 2)
                                  <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#modal-{{ $examen->id }}"><i class="fas fa-clipboard-list"></i>  Disponible</button>
                                  @endif                          
                                  @if($examen->id_estado == 3)
                                  <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#modalC-{{ $examen->id }}">Contestado<i class="fas fa-clipboard-list"></i></button>
                                  @endif
                                </td>
                                @include('user.modales.confirmar')
                                @include('user.modales.contestado')
                                @include('user.modales.deshabilitado')
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

    <!-- Pie Chart 
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">-->
        <!-- Card Header - Dropdown 
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Información</h6>
        </div>-->
        <!-- Card Body 
        <div class="card-body">
          <div class="chart-pie pt-4 pb-2">
            <canvas id="myPieChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>-->

</div>
<!-- /.container-fluid -->


<!-- Button trigger modal -->
