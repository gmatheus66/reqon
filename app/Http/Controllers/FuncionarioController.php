<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requerimento;
use App\Funcionario;
use App\Setor;
use App\Status;
use App\Subtipo;
use App\SetorFuncionario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class FuncionarioController extends Controller
{
    use RegistersUsers;

    public function index(Request $request){
        $nome_func = Auth::user()->nome;
        //dd(Auth::user()->cargo);
        if(Auth::user()->cargo == "Professor"){
            $func = Funcionario::where('nome', Auth::user()->nome)->get('id');
            foreach($func as $fnc){
                $func_id = $fnc['id'];
            }
            $reqs = Requerimento::where('funcionario_id', $func_id)->simplePaginate(8);
            //dd($reqs, $func);
        }else{
            $setor = Setor::where('nome', $nome_func)->get();
            $setor2 = SetorFuncionario::where('id',Auth::user()->id)->get();
            //dd($setor2[0]->setor_id);$status
            $reqs = Requerimento::where('setor_id', $setor2[0]->setor_id)->orderby('id', 'desc')->simplePaginate(8);
        }
        //dd($req)
        // $reqs->all();

        $subtp_ids = [];
        foreach($reqs as $req){
            array_push($subtp_ids, $req->subtipo_id);
        }

        $subtp_txt =[];
        foreach($subtp_ids as $sub){
            $subtipo = Subtipo::where('id', $sub)->get('descricao');
            foreach ($subtipo as $subt) {
                # code...
                array_push($subtp_txt, $subt->descricao);
            }
        }

        $status = Status::all();
        return view('funcionario.indexfunc',compact('reqs', 'subtp_txt','status'));

    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'funcionario/registerfunc';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:funcionario');
    }

    public function create()
    {
        return view('funcionario.registerfunc');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */



    protected function store(Request $request){

        $req = new Funcionario([

            'cpf' => $request->get('cpf'),
            'nome' => $request->get('name'),
            'rg_numero' => $request->get('rg_num'),
            'rg_estado' => $request->get('rg_esta'),
            'rg_orgao_exp' => $request->get('orgao_exp'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('senha')),
            'telefone' => $request->get('telefone'),
            'cargo' => $request->get('cargo'),
            'matricula' => $request->get('matricula'),
            ]);

            $req->save();

            return view('home');
    }

    public function search(Request $request){

        $input = $request->all();
        $situacao_str = $input['situacao']?? '';
        $protocolo = $input['protocolo']?? '';
        $data_ini = $input['data_ini']?? '';
        $data_fin = $input['data_fin']?? '';

        $status = Status::all();

        $exemplo = Requerimento::where('protocolo', '-1')->get();
        $situ = Status::where('situacao', $situacao_str)->get();

        foreach($situ as $st){
            $situacao_id = $st['id'];
        }

        if($situacao_str == "Selecione uma Situação" && $protocolo == null){
            if ($request->get('data_ini') && $request->get('data_ini')) {
                $validator = Validator::make($request->all(), [
                    'data_ini' => 'date',
                    'data_fin' => 'date'
                ]);
                if(!($validator->fails())){
                    $reqs = Requerimento::whereBetween('created_at', [date($data_ini), date($data_fin)])
                                        ->orderby('id', 'desc')
                                        ->simplePaginate(8);
                }else{
                    $reqs = $exemplo;
                }

                if($exemplo == $reqs){
                    if($request->get('data_fin')){
                        $validator = Validator::make($request->all(), [
                            'data_fin' => 'date',
                        ]);

                        $reqs = Requerimento::whereDate('updated_at','=', date($request->get('data_fin')))
                        ->orderby('id', 'desc')->simplePaginate(8);
                    //    dd($reqs);
                    }

                    if($request->get('data_ini')){
                        $validator = Validator::make($request->all(), [
                            'data_ini' => 'date',
                        ]);

                        $reqs = Requerimento::whereDate('created_at', '=', date($request->get('data_ini')))
                        ->orderby('id', 'desc')->simplePaginate(8);
                        // dd($reqs);
                    }

                    if($validator->fails()){
                        return redirect('/indexfunc?src=Insira+a+data+corretamente')
                                ->withErrors($validator)
                                ->withInput();
                    }

                    if($reqs->count() == 0){
                        // return Redirect::back()->withErrors('src', 'Não foi encontrado nenhum requerimento entre essas datas');
                        return redirect('/indexfunc?src=Nenhum+requerimento+encontrado')
                                ->withInput();
                    }

                    return view('funcionario.indexfunc',compact('reqs', 'status'));
                }else{
                    // dg();
                    if($reqs->count() == 0){
                        // return Redirect::back()->withErrors('src', 'Não foi encontrado nenhum requerimento entre essas datas');
                        return redirect('/indexfunc?src=Nenhum+requerimento+encontrado')
                                ->withInput();
                    }
                    return view('funcionario.indexfunc',compact('reqs', 'status'));
                    exit();
                }
            }
        }else{
            if($request->get('situacao') || $request->get('protocolo')){
                $validator = Validator::make($request->all(), [
                    'protocolo'=>'required|numeric|min:1',
                    'situacao'=>'numeric|min:1'
                ]);
                if($situacao_str != "Selecione uma Situação" && $protocolo != null){
                    $reqs = Requerimento::where('protocolo', $protocolo)
                    ->where('status_id', $situacao_id)
                    ->simplePaginate(8);
                }else{
                    $reqs = $exemplo;
                }

                if($exemplo == $reqs){

                    if ($situacao_str != "Selecione uma Situação") {
                        if($request->get('situacao') != "Selecione uma Situação"){
                            $validator = Validator::make($request->all(), [
                                'situacao'=>'numeric|min:1',
                            ]);

                            $reqs = Requerimento::where('status_id', $situacao_id)
                            ->orderby('id', 'desc')->simplePaginate(8);
                        }
                    }
                    if($request->get('protocolo')){
                        $validator = Validator::make($request->all(), [
                            'protocolo'=>'required|numeric|min:1'
                        ]);

                        $reqs = Requerimento::where('protocolo', $protocolo)
                        ->orderby('id', 'desc')->simplePaginate(8);
                        // dd($validator->fails());
                    }
                    // dg();
                    // if($reqs->count() == 0){
                        // return Redirect::back()->withErrors('src', 'Parâmetros inválidos');
                    // }

                    return view('funcionario.indexfunc',compact('reqs', 'status'));
                }else{
                    // if($reqs->count() == 0){
                    //     return Redirect::back()->withErrors('src', 'Parâmetros inválidos');
                    // }
                    return view('funcionario.indexfunc',compact('reqs', 'status'));
                    exit();
                }
            }
        }

        $validator = Validator::make($request->all(), [
            'data_ini' => 'date',
        ]);

        if ($validator->fails()) {
            // dd($validator);
            return redirect('/indexfunc?src=Selecione+um+filtro')
            ->withErrors($validator)
            ->withInput();
        }else{
            return view('funcionario.indexfunc',compact('reqs', 'status'));
        }


    }

    public function show($id){
        $setorfunc = SetorFuncionario::where('funcionario_id',Auth::user()->id)->get();
        $setor = Setor::all();
        $professor = Funcionario::where('cargo', 'Professor')->get();
        $requerimento = Requerimento::find($id);
        $pdfopen = false;
        $pdfarr = [];
        //dd($requerimento['setor']['nome']);
        $reqpai = Requerimento::find(1)->where('req_pai_id', $requerimento->id)->get();
        $status = Status::all();
        foreach($setor as $str){
            $setor_nome=$str['nome'];
        }
        if($requerimento->status_id == 1 || $requerimento->status_id == 2 || $requerimento->status_id == 3){
            array_push($pdfarr, true);
        }
        else{
            array_push($pdfarr, false);
        }
        foreach( $requerimento->children as $req){
            if($req->status_id == 1 || $req->status_id == 2  || $req->status_id == 3 ){
                array_push($pdfarr, true);
            }
            else{
                array_push($pdfarr, false);
            }
        }
        for($i = 0; $i < count($pdfarr); $i++){
            if($pdfarr[$i]){
                $pdfopen = true;
            }
            else{
                $pdfopen = false;
            }
        }
        //dd($setorfunc);
        //return view('funcionario.show', compact('requerimento', 'setor','reqpai'));
        return view('fulldet', compact('requerimento', 'status', 'setor', 'setor_nome', 'professor','setorfunc','pdfopen'));
    }

}
