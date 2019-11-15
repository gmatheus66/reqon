@extends('layouts.app')

@section('content')
<div class="container">
<div class="container" id="breadcrumb">
            <span class="itemBread"><a href="/">Início</a> ></span>
            <span class="breadcrumb-item active itemBread" aria-current="page">Requerimento</span>

    <div>

            <form action="{{route('pesquisarfunc')}}" method="post">
                @csrf

                    <div class="form-group">
                        <h1 class="subTitleReq">Filtrar</h1>
                    </div>

                <div class="form-row">

                    <div class="form-group col-md-6 mb-3">
                        <label for="situacao">Situação</label>
                        <select name="situacao" class="form-control" id="situacao">
                            <option>Selecione uma Situação</option>
                            @foreach ($status as $stt)
                                <option value="{{ $stt['situacao'] }}">{{ $stt['situacao'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="procotolo">Protocolo</label>
                        <input type="text" name="protocolo" class="form-control" id="procotolo" placeholder="Protocolo">
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="dateini">Data Inicial</label>
                        <input type="date" name="data_ini" class="form-control" id="dateini" placeholder="Data Inicial">
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="datend">Data Final</label>
                        <input type="date" name="data_fin" class="form-control" id="datend" placeholder="Data Final">
                    </div>

                </div>
                <button type="submit" class="linkBtn btn btnFilter" id="criarReq">Buscar</button>
            <a href="{{ route('requerimento.index')}}" class="linkFilter">Limpar filtro</a>

            </form>
    </div>
    <div class="container">
              <div class="row">
                    <div class="col-sm">
                      Protocolo
                    </div>
                    <div class="col-sm">
                      Matrícula
                    </div>
                    <div class="col-sm">
                      Status
                    </div>
                    <div class="col-sm">
                      Data
                    </div>
                    <div class="col-sm">
                      Ação
                    </div>
                    <div class="w-100"></div>
                @foreach ($reqs as $req)
                    <div class="col-sm">
                          {{$req['protocolo']}}
                        </div>
                        <div class="col-sm">
                          {{$req['matricula']['matricula']}}
                        </div>
                        <div class="col-sm">
                            {{$req['matricula']['status']}}
                        </div>
                        <div class="col-sm">
                          {{date('d-m-Y', strtotime($req['created_at']))}}
                        </div>
                        <div class="col-sm">
                          <a href="{{route('showreqfunc', $req['id'])}}" class="btn btn-primary">Detalhes</a>
                        </div>
                    <div class="w-100"></div>
                @endforeach
</div>

@endsection
