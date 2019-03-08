<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Examen;
use App\Respuesta;
use App\Pregunta;
use App\Calificacion;
use App\User;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        dd($consulta);
        $usuario = User::find($id);
        return view('admin.resultadosExamen',compact('consulta','usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.examen');
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
