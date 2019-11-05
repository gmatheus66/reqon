<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requerimento;
use App\Funcionario;
use App\Setor;
use App\Subtipo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    use RegistersUsers;

    public function index(){
        $reqs = Requerimento::where('setor_id', 1)->orderby('id', 'desc')->get();
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

        if(session('success')){
            return view('funcionario.indexfunc',compact('reqs', 'subtp_txt'));
        }else{
            return view('auth.login');
        }
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
        $this->middleware('guest');
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

    public function show($id){
        $setor = Setor::all();
        $requerimento = Requerimento::find(1)->where('id', $id)->get();
        //dd($requerimento);
        return view('funcionario.show', compact('requerimento', 'setor'));
    }

}
