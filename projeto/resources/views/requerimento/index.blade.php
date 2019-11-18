@extends('layouts.app')


@section('content')
      <div class="container" id="breadcrumb">
              <span class="itemBread"><a href="/">Início</a> ></span>
              <span class="breadcrumb-item active itemBread" aria-current="page">Requerimento</span>


                  <h1 class="titleReq">Meus requerimentos<a href="{{ route('requerimento.create')}}"><button class="linkBtn btn btn-outline-primary btnNewReq" id="criarReq"><img class="plus" src="/icon/plus.png" alt="icon name">Novo requerimento</button>
                   </a></h1>

                   @if($errors->any())
                   <div class="alert alert-danger" role="alert">
                        {{$_GET['src']}}
                    </div>
                    @endif
        <div class="container" id="cont">
            <div class="d-flex align-items-center flex-column bd-highlight mb-3">

              @if(session('success'))
                <div class="alert alert-success msgSucesso" role="alert" id="sucessoReq"><strong>{{session('success')}}</strong></div>
              @endif
            <div>

                <form action="{{route('pesquisar')}}" method="post">
                    @csrf

                        <div class="form-group">
                            <h1 class="subTitleReq">Filtrar</h1>
                        </div>

                    <div class="form-row">
                        @if(sizeof($matriculas) > 1)

                            <div class="form-group col-md-4 mb-3">
                                <label for="Curso">Curso</label>
                                <select class="form-control" id="Curso">
                                    <option selected>Selecione um Curso</option>
                                    @foreach ($matriculas as $matricula)
                                    <option value="{{$matricula->curso->id}}">{{$matricula->curso->nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                        @endif

                        <div class="form-group col-md-6 mb-3">
                            <label for="situacao">Situação</label>
                            <select name="situacao" class="form-control" id="situacao">
                                <option selected>Selecione uma Situação</option>
                                @foreach ($status ?? '' as $stt)
                            <option value="{{$stt->id}}" >{{$stt->situacao}}</option>
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

        <div class="container" id="cont">
            <table class="table tableA">
              <thead class="table-active tableHead">
                <tr class="colReq">
                  <th scope="col">Nº do protocolo</th>
                  <th scope="col">Matrícula</th>
                  <th scope="col">Tipo</th>
                  <th class="colData" scope="col">Data</th>
                  <th scope="col">Situação</th>
                  <th scope="col">Ação</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($dados as $req)
                    <tr>
                      <th scope="row">{{$req['protocolo']}}</th>
                      <td>{{$req['matricula']['matricula']}}</td>
                      <td>{{$req['subtipo']['descricao']}}</td>
                      <td>{{date('d-m-Y', strtotime($req['created_at']))}}</td>
                      <td>{{$req['status']['situacao']}}</td>
                      <td><a href="{{route('requerimento.show', $req['id'])}}" class="btn btn-primary btnDetalhes">Detalhes</a></td>
                    </tr>
                    @endforeach
              </tbody>
            </table>
        </div>
    </div>
@endsection
