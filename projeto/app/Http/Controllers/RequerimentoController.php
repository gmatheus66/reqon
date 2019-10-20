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
        $i = 0;
        $matricula = Matricula::where('aluno_id', Auth::user()->id)->get();
        $curso = Curso::all();
        foreach($matricula as $id => $mtr){
            if($id > 1 ){
                $i = $i + $id;
            }
        }

        if($i > 1){
            return view('requerimento.index',compact('requerimento','matricula', 'curso'));
        } else{
            return view('requerimento.index',compact('requerimento'));
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

        return view('requerimento.index')->with('sucesso', 'Requerimento Criado');

    }

}
