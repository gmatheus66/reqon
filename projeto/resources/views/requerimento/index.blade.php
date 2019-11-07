@extends('layouts.app')


@section('content')
      <div class="container">
        <nav aria-label ="breadcrumb">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Início</a></li>
              <li class="breadcrumb-item active" aria-current="page">Requerimento</li>
          </ol>
        </nav>
      </div>

        <div class="container" id="cont">
            <div class="d-flex align-items-center flex-column bd-highlight mb-3">
              @if(session('success'))
                <div class="alert alert-success" role="alert" id="sucessoReq"><strong>{{session('success')}}</strong></div>
              @endif

            @if(sizeof($matriculas) > 1)

            @if($errors->any())
                @foreach($errors->get('curso') as $message)
                    <div class="alert alert-danger" role="alert">
                        {{ $_GET['curso'] }}
                    </div>
                @endforeach
            @endif

            <div class="div-req">
            <center>
              <form action="{{route('requerimento.create')}}" method="get">
                      <select class="browser-default custom-select custom-select-lg" name="curso" required>
                              <option selected>Selecione Um curso</option>
                                @foreach ($matriculas as $matricula)
                                    <option value="{{$matricula->curso->id}}">{{$matricula->curso->nome}}</option>
                                @endforeach

                      </select>
                        <button class="btn btn-outline-primary" id="criarReq"><a class="linkBtn" href="{{ route('requerimento.create')}}">Criar Requerimento</a></button>
              </form>
            </center>
            </div>
            @else
                <a href="{{ route('requerimento.create')}}"><button class="linkBtn btn btn-outline-primary" id="criarReq">Criar Requerimento</button></a>
            @endif
            <div class="container">
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
                      Ação
                    </div>
                <div class="w-100"></div>
                @foreach ($dados as $req)
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
                          <a href="{{route('requerimento.show', $req['id'])}}" class="btn btn-primary">Detalhes</a>
                        </div>
                        <div class="w-100"></div>
                    @endforeach     
        </div>
    </div>
@endsection
