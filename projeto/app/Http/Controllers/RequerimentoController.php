<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requerimento;
use App\Subtipo;
use App\Tipo;
use App\Aluno;
use App\Matricula;


class RequerimentoController extends Controller
{
    public function index(){
        
        $requerimento = Requerimento::all();

        return view('requerimento.index',compact('requerimento'));
        
    }


    public function create(){

        $tipo = Tipo::all();
               
        return view('requerimento.create', compact('tipo'));
    }

    public function store(Request $request){
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
            'matricula_id' => null
        ]);

        $req->save();

        return view('requerimento.index')->with('sucesso', 'Requerimento Criado');
        
    }

}
