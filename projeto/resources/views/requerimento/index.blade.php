@extends('layouts.app')


@section('content')

	    <div class="container" id="cont">
			<div class="d-flex align-items-center flex-column bd-highlight mb-3" style="height: 100px;">
			  @if(session('success'))
			  	<div class="alert alert-success" role="alert" id="sucessoReq"><strong>{{session('success')}}</strong></div>
              @endif

            @if(sizeof($matriculas) > 1)
            <div class="div-req">
            <center>
              <form action="{{route('requerimento.create')}}" method="get">
                      <select class="browser-default custom-select custom-select-lg mb-3" name="curso" required>
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
                <h3>Requerimentos do curso {{$matricula->curso->nome}}</h3>
                @foreach($matricula->requerimentos as $requerimento)
                    <div class="card cardRequerimento">
                        <h5 class="card-header">{{$requerimento->subtipo->descricao}}</h5>
                        <div class="card-body">
                            <h5 class="card-title">Matricula: {{$requerimento->matricula->matricula}}</h5>
                            <p class="card-text">Status: {{$requerimento->status->situacao}}</p>
                            <p class="card-text">Data: {{date('d-m-Y', strtotime($requerimento->created_at))}}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                @endforeach
            @endforeach


            </div>

		</div>

@endsection
