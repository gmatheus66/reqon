@extends('layouts.app')


@section('content')
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
    </script>
      <div class="container" id="breadcrumb">
              <span class="itemBread"><a href="/">Início</a> ></span>
              <span class="breadcrumb-item active itemBread" aria-current="page">Requerimento</span>


                  <h1 class="titleReq">Meus requerimentos<a href="{{ route('requerimento.create')}}"><button class="linkBtn btn btn-outline-primary btnNewReq" id="criarReq"><img class="plus" src="/icon/plus.png" alt="icon name">Novo requerimento</button>
                   </a></h1>


        <div class="container" id="cont">
            <div class="d-flex align-items-center flex-column bd-highlight mb-3">
              @if(session('success'))
                <div class="alert alert-success" role="alert" id="sucessoReq"><strong>{{session('success')}}</strong></div>
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
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                        </div>
                        @endif
                        <div class="form-group col-md-4 mb-3">
                            <label for="situacao">Situção</label>
                            <select class="form-control" id="situacao">
                                <option selected>Selecione uma Situação</option>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div>
                          <div class="form-group col-md-4 mb-3">
                              <label for="procotolo">Protocolo</label>
                              <input type="number" class="form-control" id="procotolo" placeholder="Protocolo">
                          </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="dateini">Data Inicial</label>
                            <input type="date" class="form-control" id="dateini" placeholder="Data Inicial">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <label for="datend">Data Final</label>
                            <input type="date" class="form-control" id="datend" placeholder="Data Final">
                        </div>

                    </div>
                    <button type="submit" class="linkBtn btn btnFilter" id="criarReq">Buscar</button>
                        <a href="#" class="linkFilter">Limpar filtro</a>

                </form>
      </div>

        <div class="container" id="cont">
            <table class="table tableA">
              <thead class="table-active tableHead">
                <tr>
                  <th scope="col-6">Nº do protocolo</th>
                  <th scope="col">Matrícula</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Data</th>
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
