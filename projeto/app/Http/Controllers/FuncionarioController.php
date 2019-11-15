<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requerimento;
use App\Funcionario;
use App\Setor;
use App\Status;
use App\Subtipo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    use RegistersUsers;

    public function index(){
        $reqs = Requerimento::where('setor_id', 1)->orderby('id', 'desc')->paginate(8);
        // $reqs->all();
        // $reqs = DB::select('SELECT * FROM requerimentos ORDER BY DATE_FORMAT(created_at, "%y-%m-%d %H:%i:%S")DESC');

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
        $situacao_str = $input['situacao'];
        $protocolo = $input['protocolo'];
        $data_ini = $input['data_ini'];
        $data_fin = $input['data_fin'];

        $status = Status::all();

        $exemplo = Requerimento::where('protocolo', $protocolo)->get();
        $situ = Status::where('situacao', $situacao_str)->get();
        foreach($situ as $st){
            $situacao_id = $st['id'];
        }

        if($request->get('protocolo', 'situacao')){
            $validator = Validator::make($request->all(), [
                'protocolo'=>'required|numeric|min:1',
                'situacao'=>'numeric|min:1'
            ]);

            $reqs = Requerimento::whereDate('protocolo', $protocolo)
            ->where('status_id', $situacao_id)
            ->get();

            if($exemplo == $reqs){
                // dd("teste");

                if($request->get('situacao') != "Selecione uma Situação"){
                    $validator = Validator::make($request->all(), [
                        'situacao'=>'numeric|min:1',
                    ]);

                    $reqs = Requerimento::where('status_id', $situacao_str)
                    ->orderby('id', 'desc')->get();
                }

                if($request->get('protocolo')){
                    $validator = Validator::make($request->all(), [
                        'protocolo'=>'required|numeric|min:1'
                    ]);

                    $reqs = Requerimento::where('protocolo', $protocolo)
                    ->orderby('id', 'desc')->get();
                    // dd($validator->fails());
                }

            }else{
                return view('funcionario.indexfunc',compact('reqs', 'status'));
                exit();
            }
        }

        if ($request->get('data_ini', 'data_fin')) {
            $validator = Validator::make($request->all(), [
                'data_ini' => 'date',
                'data_fin' => 'date'
            ]);
            $reqs = Requerimento::whereBetween('created_at', [date($data_ini), date($data_fin)])->get();

            if($exemplo == $reqs){

                if($request->get('data_fin')){
                    $validator = Validator::make($request->all(), [
                        'data_fin' => 'date',
                    ]);

                    $reqs = Requerimento::whereDate('updated_at','=', date($request->get('data_fin')))
                    ->orderby('id', 'desc')->get();
                //    dd($reqs);
                }

                if($request->get('data_ini')){
                    $validator = Validator::make($request->all(), [
                        'data_ini' => 'date',
                    ]);

                    $reqs = Requerimento::whereDate('created_at', '=', date($request->get('data_ini')))
                    ->orderby('id', 'desc')->get();
                    // dd($reqs);
                }

            }else{
                return view('funcionario.indexfunc',compact('reqs', 'status'));
                exit();
            }
        }

        if ($validator->fails()) {
            // dd($validator);
            return redirect('/requerimento?src=Selecione+um+filtro')
            ->withErrors($validator)
            ->withInput();
        }else{
            return view('funcionario.indexfunc',compact('reqs', 'status'));
        }


    }

    public function show($id){
        $setor = Setor::all();
        $requerimento = Requerimento::find(1)->where('id', $id)->get();
        $reqpai = Requerimento::find(1)->where('req_pai_id', $requerimento[0]->id)->get();
        //dd($reqpai);
        return view('funcionario.show', compact('requerimento', 'setor','reqpai'));
    }

}
