<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requerimento;
use App\Funcionario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
    use RegistersUsers;

    public function index(){
        $reqs = Requerimento::all();

        return view('funcionario.indexfunc',compact('reqs'));
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

}
