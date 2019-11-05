@extends('layouts.app')


@section('content')

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

            @foreach($matriculas as $matricula)
            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header cardRequerimento row justify-content-center" id="headingOne">
                    <button class="btn btn-link btn-Req " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <h3>Requerimentos do curso {{$matricula->curso->nome}}</h3>
                    </button>
                </div>
                
                    @foreach ($dados as $req)
                    
                        <div class="card cardRequerimento">
                            <h5 class="card-header">{{$req['subtipo']['descricao']}}</h5>
                            <div class="card-body">
                                <h5 class="card-title">Matricula: {{$req['matricula']['matricula']}}</h5>
                                <p class="card-text">Status: {{$req['status']['situacao']}}</p>
                                <p class="card-text">Data: {{date('d-m-Y', strtotime($req['created_at']))}}</p>
                                <p class="card-text">Descrição: {{$req['descricao']}}</p>
                                <a href="{{route('requerimento.show', $req['id'])}}" class="btn btn-primary">Detalhes</a>
                            </div>
                        </div>
                    @endforeach
            @endforeach
            </div>
        </div>
    </div>

  
@endsection
