<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contato;

class ContatoController extends Controller
{
    public function __constructor(){
        $this->middleware('guest');
    }

    public function store(Request $request){
        //dd($request);
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|min:1|max:50',
            'email' => 'required|min:1|max:50',
            'msg' => 'required|min:1|max:1000'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();

        }
        $cont = new Contato([
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'mensagem' => $request->get('msg')
        ]);

        $cont->save();

        return redirect()->back()->withSuccess('Enviado com Sucesso');

    }
}
