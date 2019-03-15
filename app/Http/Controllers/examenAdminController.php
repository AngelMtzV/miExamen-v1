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
use Alert;
class examenAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    #Metodo para mostrar el listado de examenes
    public function index()
    {
        #se realiza una consulta a la entidad examenes para trarer todos su registros
        $examenes = Examen::get();
        return view('admin.listExamen', compact('examenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    #metodo que nos manda a la vista donde colocaremos los datos para un nuevo examen
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
    #metodo para crear un nuevo examen
    public function store(Request $request)
    {
        #primero validamos los campos
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'no_preguntas' => 'required',
            'fecha' => 'required',
            'tiempo' => 'required',
            'id_estado' => 'required',
        ]);
        #después de ser validados 
        //se crea una nueva asignatura
        $examen =  new Examen;
        $examen->nombre = $request->get('nombre');
        $examen->descripcion = $request->get('descripcion');
        $examen->no_preguntas = $request->get('no_preguntas');
        $examen->fecha = $request->get('fecha');
        $examen->tiempo = $request->get('tiempo');
        $examen->id_estado = $request->get('id_estado');
        //Se guardan los datos
        $examen->save();
        Alert::success('El examen se creo correctamente', '¡Éxito!')->autoclose(6000);
        //Session::flash('message','Examen agregado corectamente');
        return redirect()->route('examenesAdmin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    #Metodo para mostrar la calificacion de un ausuario
    public function show($id)
    {
        #Consulta para buscar la calificacion del usuario seleccionado
        $consulta = DB::table('calificacions')
        ->join('users','users.id','=','calificacions.id_usuario')
        ->join('examens','examens.id','=','calificacions.id_examen')
        ->where('id_usuario',$id)
        ->get();

        #validación para que no muestre error al buscar la calificación de un usuario que no tiene aún ninguna calificacion
        #Se pregunta si la conuslta viene vacia, si es así nos retorna a el listado de usuarios con un mensaje de error
        if (empty($consulta[0])) {
            alert()->error('El usuario aún no realiza ningun examen')->autoclose(6000);
            //Session::flash('error','El usuario aún no realiza ningun examen');
            return redirect()->route('home');
        }elseif ($consulta[0] != null) {
            #Se pregunta si la conuslta es diferente de null, si es así busca la calificacion del usuario a travez de su id y se muestra en la vista
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
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    #Metodo que nos retorna a la vista para poder modificar los datos de un examen
    public function edit($id)
    {
        #consulta que nos traera los valores del examen a modificar
        $examen = Examen::find($id);
        $estado = Estado::get();
        return view('admin.examenes.editarExamen', compact('examen', 'estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    #metodo para actualizar los datos del examen
    public function update(Request $request, $id){
        #priemero validamos los campos
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'no_preguntas' => 'required',
            'fecha' => 'required',
            'tiempo' => 'required',
            'id_estado' => 'required',
        ]);
        #despues de ser validados
        //se actualiza el Examen
        $examen = Examen::find($id);
        $examen->nombre = $request->get('nombre');
        $examen->descripcion = $request->get('descripcion');
        $examen->no_preguntas = $request->get('no_preguntas');
        $examen->fecha = $request->get('fecha');
        $examen->tiempo = $request->get('tiempo');
        $examen->id_estado = $request->get('id_estado');
        //Se guardan los datos
        $examen->save();
        Alert::success('El examen se actualizo correctamente', '¡Éxito!')->autoclose(6000);
        //Session::flash('message','Examen actualizado correctamente');
        return redirect()->route('examenesAdmin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    #metodo para eliminar un examen
    public function destroy($id)
    {
        #primero buscamos el examen que se desea eliminar a travez de su id
        $examen = Examen::find($id);
        #usamos el metodo delete para destruirlo
        $examen->delete();
        Alert::success('El examen se elimino correctamente', '¡Éxito!')->autoclose(6000);
        //Session::flash('message','Examen eliminado correctamente');
        return redirect()->route('examenesAdmin.index');
    }
}
