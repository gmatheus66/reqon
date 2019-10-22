<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requerimento;
use App\Subtipo;
use App\Tipo;
use App\Aluno;
use App\Matricula;
use App\Curso;
use Illuminate\Support\Facades\Auth;


class RequerimentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $requerimento = Requerimento::all();
        $cont = 0;
        $matricula = Matricula::where('aluno_id', Auth::user()->id)->get();
        $curso = Curso::all();
        $matr = Matricula::find(1)->where('aluno_id', Auth::user()->id)->first();
        $mtr = Matricula::find(1)->where('aluno_id', Auth::user()->id)->get();

        $mtsize = sizeof($mtr);
        //var_dump($mtsize);

        $crs = [];

        foreach($mtr as  $m){
            array_push($crs,Curso::find(1)->where('id', $m->curso_id)->get() );
            //var_dump($crs);
        }



          return view('requerimento.index',compact('requerimento', 'crs','matricula','mtsize'));

        if($mtsize > 1){
        } else{
            return view('requerimento.index',compact('requerimento','cont'));
        }

    }


    public function create(){

        $tipo = Tipo::all();


        return view('requerimento.create', compact('tipo'));
    }

    public function store(Request $request){

        $matricula = Matricula::where('aluno_id', Auth::user()->id)->first();
        $mtr = $matricula->id;

        $request->validate([
            'descricao'=>'required',
            'subtipo'=>'required'
        ]);

        $req = new Requerimento([
            'protocolo' => mt_rand(1,999999999),
            'descricao' => $request->get('descricao'),
            'subtipo_id' => $request->get('subtipo'),
            'status_id' => 1,
            'req_pai_id' => null,
            'funcionario_id' => null,
            'setor_id' => null,
            'matricula_id' => $mtr
        ]);

        $req->save();

        return redirect()->route('requerimento.index')->withSuccess('Requerimento Criado');
    }

}
