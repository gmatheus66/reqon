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
use App\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Node\Builder;

class RequerimentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $matriculas = Auth::user()->matriculas->sort(function($m1, $m2) {
            return strcmp($m1->curso->nome, $m2->curso->nome);
        });

        /*$matriculas = usort($matriculas, function($m1, $m2) {
            return strcmp($m1->curso->nome, $m2->curso->nome);
        });*/
        $dados = Requerimento::with('subtipo')->where('matricula_id',$matriculas[0]['id'])->orderby('id', 'desc')->paginate(5);
        //dd($dados);
        $test = Tipo::with('subtipos')->get();
        $status = Status::all();
        //dd($status);
        return view('requerimento.index',compact('matriculas','dados', 'status'));
    }

    public function search(Request $request){

        $matriculas = Auth::user()->matriculas->sort(function($m1, $m2) {
            return strcmp($m1->curso->nome, $m2->curso->nome);
        });

        $status = Status::all();

        $input = $request->all();
        $situacao = $input['situacao'];
        $protocolo = $input['protocolo'];
        $data_ini = $input['data_ini'];

        if($request->get('data_ini')){
            $validator = Validator::make($request->all(), [
                'data_ini' => 'date',
            ]);
            $dados = Requerimento::whereDate('created_at', '=', date($request->get('data_ini')))
            ->where('matricula_id',$matriculas[0]['id'])->orderby('id', 'desc')->get();
            //dd($dados);
        }
        if($request->get('data_fin')){
            $validator = Validator::make($request->all(), [
                'data_fin' => 'date',
            ]);
            $dados = Requerimento::whereDate('updated_at','=', date($request->get('data_fin')))
            ->where('matricula_id',$matriculas[0]['id'])->orderby('id', 'desc')->get();
           //dd($dados);
        }
        if($request->get('situacao') != "Selecione uma Situação"){
            $validator = Validator::make($request->all(), [
                'situacao'=>'numeric|min:1',
            ]);
            $dados = Requerimento::where('status_id', $request->get('situacao'))
            ->where('matricula_id',$matriculas[0]['id'])->orderby('id', 'desc')->get();
            //dd($dados);
        }
        if($request->get('protocolo')){
            $validator = Validator::make($request->all(), [
                'protocolo'=>'required|numeric|min:1'
            ]);
            $dados = Requerimento::where('protocolo', $protocolo)
            ->where('matricula_id',$matriculas[0]['id'])->orderby('id', 'desc')->get();
            //dd($dados);
        }

        if ($validator->fails()) {
            //dd($validator);
            return redirect('/requerimento?src=Selecione+um+filtro')
                        ->withErrors($validator)
                        ->withInput();
        }
        //$status = Status::where('id', )->get();

        $exemplo = Requerimento::where('protocolo', '-1')->get();
        //dd($dados);


        //$dados = Requerimento::with('subtipo')->where('matricula_id',$matriculas[0]['id'])->orderby('id', 'desc')->get();

        //dd($dados);
        if ($dados == $exemplo) {
            $msg = "Não foi possivel encontrar seu requerimento";
            return view('requerimento.index', compact('msg'));
            exit();
        }else{
            return view('requerimento.index', compact('dados', 'matriculas', 'status'));
        }

        // dd($teste);

        $dados = Requerimento::where('descricao', $tipo)->get();
        return view('requerimento.index', compact('dados'));
    }

    public function create(Request $request){

        $tipo= Tipo::all();
        $curso = $request->get('curso');

        $matriculas = Auth::user()->matriculas->sort(function($m1, $m2) {
            return strcmp($m1->curso->nome, $m2->curso->nome);
        });
        //dd($matriculas);
        return view('requerimento.create', compact('tipo','curso','matriculas') );
    }

    public function store(Request $request){

        //dd($request->get('crs'));
        if($request->get('crs')){
            $validator = Validator::make($request->all(), [
                'crs'=>'required|numeric|min:1'
            ]);
            if ($validator->fails()) {
                //dd($validator);
                return redirect('/requerimento/create?crs=Selecione+Um+curso')
                            ->withErrors($validator)
                            ->withInput();
            }

            $matricula = Auth::user()->matriculas->where('curso_id', $request->get('crs'))->where('aluno_id', Auth::user()->id)->first();
            //dd($matricula);
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
            'status_id' => 2,
            'req_pai_id' => null,
            'funcionario_id' => null,
            'setor_id' => $str,
            'matricula_id' => $mtr
        ]);

        $req->save();

        return redirect()->route('requerimento.index')->withSuccess('Requerimento Criado');
    }

    public function show($id){
        $setor = Setor::all();
        $requerimento =  Requerimento::find(1)->where('id',$id)->get();
        $reqpai = Requerimento::find(1)->where('req_pai_id', $requerimento[0]->id)->get();
        //dd($reqpai);
        return view('funcionario.show', compact('requerimento', 'setor','reqpai'));
    }

    public function update(Request $request){

    }


}
