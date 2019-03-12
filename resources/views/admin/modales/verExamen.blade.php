<!-- Modal -->
<div class="modal fade" id="ModalVer-{{$examen->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h5 class="modal-title" id="exampleModalLabel">Examen de {{ $examen->nombre }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true" style="color: #fff;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <pre>{{ $examen->descripcion }}</pre>
        <hr>
        <ul>
          <li>
            <p>Fecha limite para realizar el examen: <strong>{{ $examen->fecha }}</strong></p>
          </li>
          <li>
            <p>Tiempo: <strong>{{ $examen->tiempo }}</strong></p>
          </li>
          <li>
            <p>Total de preguntas: <strong>{{ $examen->no_preguntas }}</strong></p>
          </li>
          <li>
            <p>Estado: <strong>{{ $examen->id_estado == 1 ? 'Deshabilidado' : 'Habilitado' }}</strong></p>
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a href="{{ route('preguntasAdmin',$examen->id) }}"><button type="button" class="btn btn-primary">Agregar preguntas</button></a>
      </div>
    </div>
  </div>
</div>
