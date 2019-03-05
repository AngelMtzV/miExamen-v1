<!--Formulario para imprimir las preguntas dinamicamente-->

<form name="guardar_preguntas" method="POST" action="{{ route('preguntas.store') }}" id="formid">
	<input type="text" id="idExamen" name="idExamen" value="{{ $examen->id }}" hidden>
	{{ csrf_field() }}
	@forelse($preguntas as $pregunta)
	@php
		@$cont++
	@endphp
	<div class="container">
		<div class="card">
		  <div class="card-header primary" style="background-color: #4e73df">
		    <strong><pre style="color: #fff">{{ $cont }}.-{{ $pregunta->pregunta }}</pre></strong>
		  </div>
		  <div class="card-body">
		    <div class="form-group form-check">
	          <input value="1"  type="radio" class="form-check-input option-input radio" name="radio{{ $pregunta->id }}[]" id="Check" checked>
		      <label class="form-check-label" for="exampleCheck1"><pre> {{ $pregunta->opcion1 }}</pre></label>
	        </div>
	        <div class="form-group form-check">
	          <input value="2" type="radio" class="form-check-input option-input radio" name="radio{{ $pregunta->id }}[]" id="Check">
		      <label class="form-check-label" for="exampleCheck2"><pre> {{ $pregunta->opcion2 }}</pre></label>
	        </div>
	        <div class="form-group form-check">
	          <input value="3" type="radio" class="form-check-input option-input radio" name="radio{{ $pregunta->id }}[]" id="Check">
		      <label class="form-check-label" for="exampleCheck3"><pre> {{ $pregunta->opcion3 }}</pre></label>
	        </div>
		    <div class="form-group form-check">
	          <input value="4" type="radio" class="form-check-input option-input radio" name="radio{{ $pregunta->id }}[]" id="Check">
		      <label class="form-check-label" for="exampleCheck4"><pre> {{ $pregunta->opcion4 }}</pre></label>
	        </div>
		  </div>
		</div><hr>
	</div>
	@empty
	<h3>No existen registros</h3>
	@endforelse
	<div class="container my-auto">
		<div class="text-center my-auto">
			<a type="submit" id="enviar" class="btn btn-primary" onclick="ver()"><strong style="color: #fff;">Finaizar examen <i class="fab fa-telegram-plane"></i></strong></a>
		</div>
	</div>
	
</form>

