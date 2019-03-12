<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use Session;
use Validator;
use Response;

class adminPreguntasExamen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}
    public function crear($id)
    {
        $preguntas = Pregunta::where('id_examen', $id)->get();
        $idExamen = $id;
        return view('admin.examenes.addPreguntas', compact('preguntas','idExamen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'inpPregunta' => 'required',
            'inpOpcion1' => 'required',
            'inpOpcion2' => 'required',
            'inpOpcion3' => 'required',
            'inpIdExamen' => 'required',
            'opcionid' => 'required',
        ]);
        //dd($request);
        //se crea una nueva pregunta
        if($request->file('cargarImg') == null){
           $my_img = "";
        }
        else{
            $my_img = $request->file('cargarImg')->store('imagenPregunta');
        }

        $pregunta =  new Pregunta;
        $pregunta->pregunta = $request->get('inpPregunta');
        $pregunta->imagen = $my_img;
        $pregunta->opcion1 = $request->get('inpOpcion1');
        $pregunta->opcion2 = $request->get('inpOpcion2');
        $pregunta->opcion3 = $request->get('inpOpcion3');
        $pregunta->opcion4 = $request->get('inpOpcion4');
        $pregunta->opcion5 = $request->get('inpOpcion5');
        $pregunta->opcion6 = $request->get('inpOpcion6');
        $pregunta->respuesta = $request->get('opcionid');
        $pregunta->id_examen = $request->get('inpIdExamen');
        //Se guardan los datos
        //dd($pregunta);
        $pregunta->save();
        Session::flash('message','Pregunta agregada correctamente');
        return back()->with('message','Pregunta agregada correctamente');
        //return redirect()->route('indexE');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
