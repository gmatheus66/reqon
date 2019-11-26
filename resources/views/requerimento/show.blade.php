@extends('layouts.app')


@section('content')
      <div class="container">
          <div class="container" id="breadcrumb">
            <span class="itemBread"><a href="/">Início</a> ></span>
            <span class="itemBread"><a href="/requerimento">Requimentos</a> ></span>
            <span class="breadcrumb-item active itemBread" aria-current="page">Detalhes </span>
        </nav>
      </div>
          <center>
            <div class="div-req">
                <a href="{{ route('requerimento.create')}}"><button class="btnReq linkBtn btn btn-outline-primary">Criar requerimento</button></a>
                <a href="{{ route('requerimento.index')}}"><button class="btnReq linkBtn btn btn-outline-primary">Meus requerimentos</button></a>
            </div>
          </center>

          <h1 class="titleReq">Detalhes do Requerimento</h1>
         
      <div class="container" id="cont">
       <div class="container-fluid">
                @if($requerimento)
                    @foreach ($requerimento as $req)

                    <h3 class="subTitleReq">Dados do Estudante</h3>

                    <div class="">                        
                      Matrícula:{{$req['matricula']['matricula']}}

                      Nome: {{$req->matricula->aluno->nome}}

                      Status da matrícula:{{$req['matricula']['status']}}
                  
                      Curso:{{$req['matricula']['curso']['nome']}}

                      Semestre:{{$req['matricula']['semestre']}}

                      </div>
                    @endforeach
                @endif
            </div>
            <hr class="my-4">
            <div class="" id="cont">
                 <div class="container-fluid">
                     @if($reqpai)
                        @foreach ($reqpai as $req)

                        <div class="row">

                            <div class="col-sm">
                              {{$req['protocolo']}}
                            </div>
                            <div class="col-sm">
                              {{$req['matricula']['matricula']}}
                            </div>
                            <div class="col-sm">
                                {{$req->matricula->aluno->nome}}
                            </div>
                            <div class="col-sm">
                              {{$req->matricula->curso->nome}}
                            </div>
                            <div class="col-sm">
                              {{$req['subtipo']['descricao']}}
                            </div>
                            <div class="col-sm">
                                {{date('d-m-Y', strtotime($req['created_at']))}}
                            </div>
                            <div class="col-sm">
                                {{$req['status']['situacao']}}
                            </div>
                            <div class="col-sm">
                                {{$req['matricula']['semestre']}}
                            </div>
                            <div class="col-sm">
                                {{$req['matricula']['status']}}
                            </div>
                            <div class="col-sm">
                                {{$req['setor']['nome']}}
                            </div>
                            <div class="col-sm">
                                {{$req['descricao']}}
                            </div>
                        </div>
                        @endforeach
                        @endif
                </div>

        </div>
@endsection