<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4 container">
    <h1><img src="{{ asset('imagenes/admin3.png') }}" width="70" height="60"> Administrador - Usuarios</h1>

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
                                <td style="align-content: center;">               
                                  <a href="{{ route('examenesAdmin.show',$user->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm botonesTablas" data-toggle="tooltip" data-placement="top" title="Resultados"><i class="fas fa-clipboard-list"></i></a>
                                  <a data-target="#ModalVer-{{$user->id}}" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm text-white botonesTablas" data-toggle="tooltip" data-placement="top" title="Mostrar"><i class="fas fa-eye"></i></a>
                                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm botonesTablas" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm botonesTablas"><i class="fas fa-trash-alt"></i></a>
                                </td>@endif
                                @empty
                                <h4 class="alert alert-info"><i class="fas fa-info-circle"></i> Aún no existen registros</h4>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
              </div>
            </div>
          </div>
    </div>
  </div>
  
</div>
<!-- /.container-fluid -->