<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requerimento;
use App\Funcionario;
use App\Setor;
use App\Subtipo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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

        return view('funcionario.indexfunc',compact('reqs', 'subtp_txt'));
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
        $req = $request->all();
        $setor = Setor::all();
        $tipo = $req['tipo'];
        // dd($setor);
        $reqs = Requerimento::where('descricao', $tipo)->get();
        // echo "teste";
        return view('funcionario.indexfunc',compact('reqs','setor'));
    }

    public function show($id){
        $setor = Setor::all();
        $requerimento = Requerimento::find(1)->where('id', $id)->get();
        $reqpai = Requerimento::find(1)->where('req_pai_id', $requerimento[0]->id)->get();
        //dd($reqpai);
        return view('funcionario.show', compact('requerimento', 'setor','reqpai'));
    }

}
