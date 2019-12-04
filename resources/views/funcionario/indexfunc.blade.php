@extends('layouts.app')

@section('content')
<div class="container">
<div class="container" id="breadcrumb">
            <span class="itemBread"><a href="/">Início</a> ></span>
            <span class="breadcrumb-item active itemBread" aria-current="page">Requerimentos</span>
            @if($errors->any())
            <div class="alert alert-danger" role="alert">
                 {{$_GET['src']}}
             </div>
             @endif
             <div class="d-flex align-items-center flex-column bd-highlight mb-4">
            <form action="{{route('pesquisarfunc')}}" method="post">
                @csrf

                    <div class="form-group">
                        <h1 class="subTitleReq">Filtrar</h1>
                    </div>

                <div class="form-row">

                    <div class="form-group col-md-7 mb-3">
                        <label for="situacao">Situação</label>
                        <select name="situacao" class="form-control" id="situacao">
                            <option>Selecione uma Situação</option>
                            @foreach ($status as $stt)
                                <option value="{{ $stt['situacao'] }}">{{ $stt['situacao'] }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group col-md-7  mb-3">
                            <label for="procotolo">Protocolo</label>
                            <input type="text" name="protocolo" class="form-control" id="procotolo" placeholder="Protocolo">
                        </div>

                        <div class="w-100"></div>
                          Data de abertura do requerimento
                          <div class="w-100"></div>
                          
                          <div class="row">
                          <div class="col">
                            <label for="dateini"><input type="date" name="data_ini" class="form-control" id="dateini" placeholder="Data Inicial"></label>
                          </div>
                          <div class="row">
                          <div class="col-sm-3 col-md-6 col-lg-4"> a</div>
                          </div>
                          <div class="col">
                            <label for="datend"><input type="date" name="data_fin" class="form-control" id="datend" placeholder="Data Final"></label>
                          </div>
                        </div>
                </div>
                <button type="submit" class="linkBtn btn btnFilter" id="criarReq">Buscar</button>
            <a href="{{ route('func')}}" class="linkFilter">Limpar filtro</a>

            </form>
    <div class="container" id="cont">
        <table class="table tableA">
              <thead class="table-active tableHead">
                <tr class="colReq">
                  <th scope="col">Nº do protocolo</th>
                  <th scope="col">Matrícula</th>
                  <th scope="col">Status</th>
                  <th class="colData" scope="col">Data</th>
                  <th scope="col">Ação</th>
                </tr>
              </thead>
              <tbody>
                    @if(sizeof($reqs) < 1)
                    <th colspan="6" class="msgReqVazio">Não encontramos nenhum requerimento :(</th>
                  @endif
                  @foreach ($reqs as $req)
                    <tr>
                      <th scope="row">{{$req['protocolo']}}</th>
                      <td>{{$req['matricula']['matricula']}}</td>
                      <td>{{$req['status']['situacao']}}</td>
                      <td>{{date('d-m-Y', strtotime($req['created_at']))}}</td>
                      <td><a href="{{route('showreqfunc', $req['id'])}}" class="btn btn-primary btnDetalhes">Detalhes</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$reqs->links()}}
    </div>

@endsection
