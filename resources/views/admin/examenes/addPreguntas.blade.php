@extends('layouts.app')

@section('botonNavExamenes')
{{ 'active' }}
@endsection

@section('content')
<div class="container">
    <div class="container">
      @if(Session::has('message'))
          <div class="alert alert-info">
              {{ Session::get('message') }}
          </div>
      @endif
    </div>
    <div class="container">
      @if(Session::has('error'))
          <div class="alert alert-danger">
              {{ Session::get('error') }}
          </div>
      @endif
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Agregar preguntas</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('preguntasAdmin.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="col-md-8">
                  <label for="exampleInputPregunta">Pregunta:</label>
                  <!--<input type="text" class="form-control" name="inpPregunta" aria-describedby="Nombre" placeholder="¿Pregunta...?">-->
                  <textarea class="form-control" name="inpPregunta" id="exampleFormControlTextarea1" rows="3"></textarea>
                  <small id="Nombre" class="form-text text-muted">Debes introducir una pregunta para el examen.</small>
                </div>
                <div class="col-md-4">
                  <label for="exampleInputPregunta">Puede agregar una imagen a la pregunta.</label><br>
                    <div class="custom-file">
                      <input type="file" accept="image/*" class="custom-file-input" id="cargarImg" name="cargarImg">
                      <label class="custom-file-label">Selecciona una imagen</label>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputOpcion1">Opción 1:</label>
                <input type="text" class="form-control" name="inpOpcion1" aria-describedby="NumeroPreguntas" placeholder="Opcion 1" max="100">
                <small id="NumeroPreguntas" class="form-text text-muted">Debes introducir la primera opcion para la pregunta.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputOpcion2">Opción 2:</label>
                <input type="text" class="form-control" name="inpOpcion2" aria-describedby="Fecha" placeholder="Opcion 2">
                <small id="Fecha" class="form-text text-muted">Debes introducir la segunda opcion para la pregunta.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputOpcion3">Opción 3:</label>
                <input type="text" class="form-control" name="inpOpcion3" aria-describedby="Tiempo" max="10" placeholder="Opcion 3">
                <small id="Tiempo" class="form-text text-muted">Debes introducir la tercera opcion para la pregunta.</small>
              </div>
                <div class="form-group">
                  <label for="exampleInputOpcion4">Opción 4:</label>
                  <input type="text" class="form-control" name="inpOpcion4" aria-describedby="Tiempo" max="10" placeholder="Opcion 4">
                  <small id="Tiempo" class="form-text text-muted">Debes introducir la cuarta opcion para la pregunta.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputOpcion5">Opción 5:</label>
                  <input type="text" class="form-control" name="inpOpcion5" aria-describedby="Tiempo" max="10" placeholder="Opcion 5">
                  <small id="Tiempo" class="form-text text-muted">Debes introducir la quinta opcion para la pregunta.</small>
                </div>
                  <div class="form-group">
                    <label for="exampleInputOpcion6">Opción 6:</label>
                    <input type="text" class="form-control" name="inpOpcion6" aria-describedby="Tiempo" max="10" placeholder="Opcion 6">
                    <small id="Tiempo" class="form-text text-muted">Debes introducir la sexta opcion para la pregunta.</small>
                  </div>
                <input type="text" class="form-control" name="inpIdExamen" value="{{ $idExamen }}" hidden>
                <select class="form-control m-bot15" name="opcionid">
                  <option selected value="" disabled>Seleccione la opción correcta</option>
                 <option value="1" >Opcion 1</option> 
                 <option value="2" >Opcion 2</option> 
                 <option value="3" >Opcion 3</option> 
                 <option value="4" >Opcion 4</option>
                 <option value="3" >Opcion 5</option> 
                 <option value="4" >Opcion 6</option> 
                </select><br>

              <div class="float-right">
                <button type="submit" class="btn btn-primary">Enviar ➤</button><hr>
              </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Usuarios</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>pregunta</th>
                          <th>opciones</th>

                          <th>Respuesta</th>
                          <th>Acciones</th>
                      </tr>
                  </thead>
                  <tbody>@forelse($preguntas as $pregunta)
                      <tr>
                          <td>{{ $pregunta->pregunta }}</td>
                          <td>1) {{ $pregunta->opcion1 }}</br>
                              2) {{ $pregunta->opcion2 }}</br>
                              3) {{ $pregunta->opcion3 }}</br>
                              4) {{ $pregunta->opcion4 }}</br>
                              5) {{ $pregunta->opcion5 }}</br>
                              6) {{ $pregunta->opcion6 }}</td>
                          <td>Opción ({{ $pregunta->respuesta }})</td>
                          <td style="align-content: center;">
                            <a data-target="#ModalVer-{{$pregunta->id}}" data-toggle="modal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm text-white botonesTablas"><i class="fas fa-eye"></i> Ver</a><br><br>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm botonesTablas"><i class="fas fa-edit"></i> Editar</a><br><br>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm botonesTablas"><i class="fas fa-trash-alt"></i> Eliminar</a>
                          </td>
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
@endsection
