<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Examen;
use App\Pregunta;
use App\Calificacion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $idUser = auth()->user()->id;
        $queryCalifica = DB::table('calificacions')->where('id_usuario',$idUser)->select('id_examen')->get();
        $examenes = Examen::orderBy('created_at', 'desc')->paginate(4);
        $Allexamenes = Examen::orderBy('created_at', 'desc')->get();
        $usuarios = User::get();
        return view('home',compact('usuarios', 'examenes','Allexamenes'));
    }

    public function examen($id){
        $examen = Examen::find($id);
        $preguntas = Pregunta::where('id_examen',$id)->get();
        $cont = 0;
        //dd($data);
        return view('user.examen', compact('preguntas','examen','cont'));
    }

    public function preguntas(){
        $preguntas = Pregunta::where('id_examen',1)->get();
        //dd($preguntas);
        return response()->json($preguntas);
    }
}
