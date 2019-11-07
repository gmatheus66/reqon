@extends('layouts.app')


@section('content')
      <div class="container">
        <nav aria-label ="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Início</a></li>
              <li class="breadcrumb-item"><a href="/requerimento">Requerimento</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
          </ol>
        </nav>
      </div>

	    <div class="container" id="cont">
			 <div class="container-fluid">
                @if($requerimento)
                    @foreach ($requerimento as $req)

                    <div class="row">
                        <div class="col-sm">
                          Protocolo
                        </div>
                        <div class="col-sm">
                          Matrícula
                        </div>
                        <div class="col-sm">
                          Tipo
                        </div>
                        <div class="col-sm">
                          Data
                        </div>
                        <div class="col-sm">
                          Situação
                        </div>
                        <div class="col-sm">
                          Semestre
                        </div>
                        <div class="col-sm">
                          Status da matrícula
                        </div>
                        <div class="col-sm">
                          Setor
                        </div>
                        <div class="w-100"></div>

                        <div class="col-sm">
                          {{$req['protocolo']}}
                        </div>
                        <div class="col-sm">
                          {{$req['matricula']['matricula']}}
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
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
@endsection
