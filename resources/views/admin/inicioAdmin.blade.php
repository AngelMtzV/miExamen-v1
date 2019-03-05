<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
    <a class="d-none d-sm-inline-block  btn-primary shadow-sm"></a>
    <a href="{{ route('register')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-user-plus"></i> Nuevo usuario</a>
  </div>

  <div class="row col-xl-12 col-lg-12">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <!-- Card Header - Dropdown -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado de Usuarios</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!--<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">-->
                <table id="example" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>E-mail</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>@forelse($usuarios as $user)
                          @if($user->id_tipoUsuario != 1)
                            <tr>
                                <td><i class="fas fa-user-alt"></i> {{ $user->name }}</td>
                                <td><i class="fas fa-envelope-square"></i> {{ $user->email }}</td>
                                <td>
                                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye"></i> Ver</a>
                                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-edit"></i> Editar</a>
                                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash-alt"></i> Eliminar</a>
                                  <a href="{{ route('examenesAdmin.show',$user->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-clipboard-list"></i> Calificaciones</a>
                                </td>@endif
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
  <div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
      <a class="d-none d-sm-inline-block  btn-primary shadow-sm"></a>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="far fa-plus-square"></i> Nuevo examen</a>
    </div>
    <h6 class="text-muted">Examenes recientes</h6>
    <!-- Content Row -->
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      @forelse($examenes as $examen)
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="h6 font-weight-bold text-primary text-uppercase mb-1">{{ $examen->nombre }}</div>
                <div class="row no-gutters align-items-center" >
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3">{{ $examen->descripcion }}</div>
                    <div class="h6 mb-0 mr-">{{ $examen->created_at }}</div>
                  </div>
                </div>
                <div class="row no-gutters align-items-center" >
                  <div class="col-auto">
                    <div class="h6 mb-0 mr-3">
                        <a href="#" style="margin-left: 70%"><span class="badge badge-primary">Ver <i class="fas fa-eye"></i></span></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      @empty
        <h3>No hay existe registro</h3>
      @endforelse
    </div>
  <br><br>
</div>
<!-- /.container-fluid -->