<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setor;
use App\Requerimento;
use App\Subtipo;
use App\Tipo;
use App\Aluno;
use App\Matricula;
use App\Curso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RequerimentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $matriculas = Auth::user()->matriculas->sort(function($m1, $m2) {
            //return strcmp($m2->curso->nome, $m1->curso->nome);
            return strcmp($m1->curso->nome, $m2->curso->nome);
        });
        /*$matriculas = usort($matriculas, function($m1, $m2) {
            return strcmp($m1->curso->nome, $m2->curso->nome);
        });*/

        //dd($crs[0][0]->id);




        return view('requerimento.index',compact('matriculas'));


    }


    public function create(Request $request){

        $tipo = Tipo::all();
        $curso = $request->get('curso');

        return view('requerimento.create', compact('tipo','curso') );
    }

    public function store(Request $request){

        if($request->get('curso')){
            $matricula = Auth::user()->matriculas->where('curso_id', $request->get('curso'))->where('id', Auth::user()->id)->first();
        }
        else{
            $matricula = Auth::user()->matriculas->first();
        }
        $setor = Setor::find(1);
        $str = $setor->id;
        $mtr = $matricula->id;

        $validator = Validator::make($request->all(), [
            'descricao'=>'required',
            'subtipo'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect('/requerimento/create?curso=Selecione+Um+curso')
                        ->withErrors($validator)
                        ->withInput();
        }

        $req = new Requerimento([
            'protocolo' => mt_rand(1,999999999),
            'descricao' => $request->get('descricao'),
            'subtipo_id' => $request->get('subtipo'),
            'status_id' => 1,
            'req_pai_id' => null,
            'funcionario_id' => null,
            'setor_id' => $str,
            'matricula_id' => $mtr
        ]);

        $req->save();

        return redirect()->route('requerimento.index')->withSuccess('Requerimento Criado');
    }

}
