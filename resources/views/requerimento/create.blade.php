@extends('layouts.app')

@section('content')
<div class="container">

<div class="container" id="breadcrumb">
            <span class="itemBread"><a href="/">Início</a> ></span>
            <span class="itemBread"><a href="/requerimento">Requerimentos</a> ></span>
            <span class="breadcrumb-item active itemBread" aria-current="page">Novo requerimento</span>

            <h1 class="titleReq">Novo requerimento</h1>

            @if($errors->any())
                @foreach($errors->get('crs') as $message)
                    <div class="alert alert-danger" role="alert">
                        {{ $_GET['crs'] }}
                    </div>
                @endforeach
            @endif

        <form action="{{ route('requerimento.store') }}" method="post">
            @csrf
                @if($errors->any())
                     @foreach($errors->get('subtipo') as $message)
                     <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                     @endforeach
                @endif
                @if(sizeof($matriculas) > 1)
                    <div class="select">
                    <p class="subTitleReq">Selecione o seu curso *</p>
                    <select class="form-control custom-select-lg" name="crs" required>
                        <option selected>Selecione um curso</option>
                          @foreach ($matriculas as $matricula)
                              <option value="{{$matricula->curso->id}}">{{$matricula->curso->nome}}</option>
                          @endforeach

                    </select>
                    </div>
                @endif
            <p class="subTitleReq">Escolha um tipo de requerimento *</p>
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
                    <div class="grupoSubT row">
                    @foreach($tp->subtipos as $sub)
                        <div class="custom-control custom-radio sub mar col-6 pb-2">
                            <input type="radio" class="custom-control-input" id="sub-{{$sub->id}}" name="subtipo" value="{{$sub->id}}">
                            <label class="custom-control-label" for="sub-{{$sub->id}}">{{$sub->descricao}}</label>
                    </div>
                    @endforeach
                    </div>
                    </div>
                @endforeach

            </div>
            <p class="subTitleReq">Insira uma descrição *</p>
            @if($errors->any())
                     @foreach($errors->get('descricao') as $message)
                     <div class="alert alert-danger" role="alert">
                      {{ $message }}
                      <?php $cor='red'; ?>
                    </div>
                     @endforeach
                @endif
            <div class="form-group" id="desc">
                <textarea class="form-control rounded-0 " id="descricao" value="{{ old('descricao') }}" rows="6" name="descricao" maxlength="1000" placeholder="Digite aqui...">{{old('descricao')}}</textarea>
            </div>

            <input type="hidden" name="curso" value="{{$curso}}">

            <button type="submit" class="btn btn-primary btn-lg btn-req">Criar requerimento</button>

        </form>

    </div>
@endsection
