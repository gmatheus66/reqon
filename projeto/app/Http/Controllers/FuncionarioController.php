<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Funcionario;
use Illuminate\Foundation\Auth\RegistersUsers;

class FuncionarioController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

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

        $validator = Validator::make($request->all(), [
            'cpf' => ['required', 'string', 'max:11'],
            'name' => ['required', 'string', 'max:255'],
            'rg_num' => ['required', 'string', 'max:8'],
            'rg_esta' => ['required', 'string', 'max:2'],
            'orgao_exp' => ['required', 'string', 'max:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'senha' => ['required', 'string', 'min:8', 'confirmed'],
            'telefone' => ['required', 'string', 'max:9'],
            'cargo' => ['required', 'string', 'max:100'],
            'matricula' => ['required', 'string', 'max:10'],
        ]);

        $req = new Funcionario($validator);

        $reqsave->save();

    }

}
 