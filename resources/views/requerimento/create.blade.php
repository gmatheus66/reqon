@extends('layouts.app')

@section('content')
<div class="container">

<div class="container" id="breadcrumb">
            <span class="itemBread"><a href="/">Início</a> ></span>
            <span class="itemBread"><a href="/requerimento">Requerimentos</a> ></span>
            <span class="breadcrumb-item active itemBread" aria-current="page">Criação de Requerimento</span>

        <div class="col-sm-8 offset-sm-2">
			<h1 class="display-6">Criar um requerimento</h1>
	    <div>



            @if($errors->any())
                @foreach($errors->get('crs') as $message)
                    <div class="alert alert-danger" role="alert">
                        {{ $_GET['crs'] }}
                    </div>
                @endforeach
            @endif

        <form action="{{ route('requerimento.store') }}" method="post">
            @csrf
            <p class="infoP">Escolha um tipo de requerimento</p>
                @if($errors->any())
                     @foreach($errors->get('subtipo') as $message)
                     <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                     @endforeach
                @endif
                @if(sizeof($matriculas) > 1)
                    <div class="select">
                    <select class="browser-default custom-select custom-select-lg" name="crs" required>
                        <option selected>Selecione Um curso</option>
                          @foreach ($matriculas as $matricula)
                              <option value="{{$matricula->curso->id}}">{{$matricula->curso->nome}}</option>
                          @endforeach

                    </select>
                    </div>
                @endif
            <ul class="nav nav-tabs abas" id="myTab" role="tablist">
                @foreach($tipo as $tp)
                    @if($tp->id == 1)
                    <li class="nav-item nav-Style">
                        <a class="nav-link abas active" id="{{$tp->descricao}}-tab" data-toggle="tab" href="#{{$tp->descricao}}" role="tab" aria-controls="{{$tp->descricao}}" aria-selected="true">{{$tp->descricao}} </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link abas" id="{{$tp->descricao}}-tab" data-toggle="tab" href="#{{$tp->descricao}}" role="tab" aria-controls="{{$tp->descricao}}" aria-selected="false">{{$tp->descricao}} </a>
                    </li>
                    @endif
                @endforeach

            </ul>

            <div class="tab-content" id="myTabContent">
                @foreach($tipo as $tp)
                    @if($tp->id == 1)
                    <div class="tab-pane fade active show" id="{{$tp->descricao}}" role="tabpanel" aria-label="{{$tp->descricao}}-tab">
                @else
                    <div class="tab-pane fade" id="{{$tp->descricao}}" role="tabpanel" aria-label="{{$tp->descricao}}-tab">
                @endif
                    <div class="grupoSubT">
                    @foreach($tp->subtipos as $sub)
                        <div class="custom-control custom-radio sub mar">
                            <input type="radio" class="custom-control-input" id="sub-{{$sub->id}}" name="subtipo" value="{{$sub->id}}">
                            <label class="custom-control-label" for="sub-{{$sub->id}}">{{$sub->descricao}}</label>
                    </div>
                    @endforeach
                    </div>
                    </div>
                @endforeach

            </div>
            <p class="infoP">Insira uma descrição</p>
            @if($errors->any())
                     @foreach($errors->get('descricao') as $message)
                     <div class="alert alert-danger" role="alert">
                      {{ $message }}
                      <?php $cor='red'; ?>
                    </div>
                     @endforeach
                @endif
            <div class="form-group" id="desc">
                <label for="Descricao">Descrição:</label>
                <textarea class="form-control rounded-0 " id="descricao" value="{{ old('descricao') }}" rows="6" name="descricao" maxlength="1000" style="border-color: {{$cor ?? 'black'}};">{{old('descricao')}}</textarea>
            </div>

            <input type="hidden" name="curso" value="{{$curso}}">

            <button type="submit" class="btn btn-primary btn-lg btn-req">Criar requerimento</button>

        </form>

    </div>
@endsection
