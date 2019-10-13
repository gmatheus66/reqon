<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Funcionario extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'cargo' => ['required', 'string', 'max:100'],
            'telefone' => ['required', 'string', 'max:9'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // $req = new Funcionario();

    }

}
 