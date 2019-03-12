<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Examen;
use App\Respuesta;
use App\Pregunta;
use App\Calificacion;
use App\User;
use App\Imagen;
use App\Estado;
use App\Charts\calificacionesUsers;
use Session;
use Validator;

class examenAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$consulta = DB::table('examens')
        ->join('users','users.id','=','.id_profesor')
        ->join('programa_educativo','programa_educativo.id','=','carga_horaria.id_programa_educativo')
        ->get();*/
        //Consulta tosas las preguntas

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = Estado::get();
        return view('admin.examenes.addExamen', compact('estado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'no_preguntas' => 'required',
            'fecha' => 'required',
            'tiempo' => 'required',
            'id_estado' => 'required',
        ]);
        
        //se crea una nueva asignatura
        $examen =  new Examen;
        $examen->nombre = $request->get('nombre');
        $examen->descripcion = $request->get('descripcion');
        $examen->no_preguntas = $request->get('no_preguntas');
        $examen->fecha = $request->get('fecha');
        $examen->tiempo = $request->get('tiempo');
        $examen->id_estado = $request->get('id_estado');
        //Se guardan los datos
        //dd($examen);
        $examen->save();
        Session::flash('message','Examen agregado');
        //return back()->with('message','Los datos se han guardado correctamente.');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = DB::table('calificacions')
        ->join('users','users.id','=','calificacions.id_usuario')
        ->join('examens','examens.id','=','calificacions.id_examen')
        ->where('id_usuario',$id)
        ->get();
        //dd($consulta);
        if ($consulta != []) {
            $usuario = User::find($id);
            $aciertos = array();
            $errores = array();
            /*foreach ($consulta as $key => $value) {
                $aciertos[] =$value->aciertos;
                $errores[] =$value->errores;
            }
            dd($aciertos);*/
            $aciertos = $consulta[0]->aciertos;
            $errores = $consulta[0]->errores;

            $chart = new calificacionesUsers;
            $chart->labels(['Aciertos', 'Errores']);

            $dataset = $chart->dataset('Mi calificacion', 'pie', [$aciertos, $errores]);
            $dataset->backgroundColor(collect(['#1129BB','#8A0202']));
            $dataset->color(collect(['#1129BB','#8A0202']));

            return view('admin.resultadosExamen',compact('consulta','usuario','chart'));
        }elseif ($consulta == []) {
            Session::flash('error','El usuario aún no realiza ningun examen');
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagenes = Imagen::all();
        return view('admin.examen',compact('imagenes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
