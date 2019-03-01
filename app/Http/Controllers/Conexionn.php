<?php 
use App\Pregunta;

$preguntas = Pregunta::where('id_examen',$id)->get();
$data = json_decode($preguntas);

?>