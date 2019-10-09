<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requerimento;
use App\Subtipo;
use App\Tipo;


class RequerimentoController extends Controller
{
    public function index(){
        
        $requerimento = Requerimento::all();

        return view('requerimento.index', compact('requerimento'));
        
    }


    public function create(){

        $tipo = Tipo::all();
               
        return view('requerimento.create', compact('tipo'));
    }

    public function store(Request $request){
        $request->validate([
            'descricao'=>'required',
            'subtipo_id'=>'required',
            'matricula_id'=> 'required'
        ]);

        $req = new Requerimento([
            'protocolo' => mt_rand(1,999999999)->unique(),
            'descricao' => $request->post('descricao'),
            'subtipo_id' => $request->post('subtipo_id'),
            'status_id' => null,
            'req_pai_id' => null,
            'funcionario_id' => null,
            'setor_id' => null,
            'matricula_id' => ''
        ]);

        $req->save();
        
    }

}
