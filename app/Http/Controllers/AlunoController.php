<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requerimento;
use App\Aluno;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AlunoController extends Controller
{
    use RegistersUsers;

    public function index(){
        $reqs = Requerimento::where('matricula_id', Auth::user()->id)->get();

        return view('lunoindex',compact('reqs'));
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'register';

    public function create()
    {
        return view('register');
    }

     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    protected function store(Request $request){

        $req = new Aluno([

            'nome' => $request->get('name'),
            'email' => $request->get('email'),
            'data_nasc'=> $request->get('data_nasc'),
            'password' => Hash::make($request->get('senha')),
            'cpf' => $request->get('cpf'),
        ]);

        $req->save();

        return view('home');

       $new = $this->repository->create($request->all());
        return response()->json(['sucesso' => 'Relatorio cadastrado com sucesso. ID: ' .$new->id]);
    }



}
