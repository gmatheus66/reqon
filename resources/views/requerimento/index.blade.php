    @extends('layouts.app')


@section('content')
      <div class="container">
                  <h1 class="titleReq">Meus requerimentos<a href="{{ route('requerimento.create')}}"><button class="linkBtn btn btn-outline-primary btnNewReq" id="criarReq"><img class="plus" src="/icon/plus.png" alt="icon name">Novo requerimento</button>
                   </a></h1>

                   @if($errors->any())
                   <div class="alert alert-danger" role="alert">
                        {{$_GET['src']}}
                    </div>
                    @endif
        <div id="cont">
            <div class="d-flex align-items-center flex-column bd-highlight mb-4">

              @if(session('success'))
                <div class="alert alert-success msgSucesso" role="alert" id="sucessoReq"><strong>{{session('success')}}</strong><button type="button" class="close" data-dismiss="alert">x</button></div>
              @endif
            <div>

                <form action="{{route('pesquisar')}}" method="post">
                    @csrf

                        <div class="form-group">
                            <h1 class="subTitleReq">Filtrar</h1>
                        </div>

                    <div class="form-row">
                        @if(sizeof($matriculas) > 1)

                            <div class="form-group col-md-7 mb-3">
                                <label for="Curso">Curso</label>
                                <select name="curso" class="form-control" id="Curso">
                                    <option value="">Qualquer curso</option>
                                    @foreach ($matriculas as $matricula)
                                      <option value="{{$matricula->curso->id}}" {{$matricula->curso->id == ($curso ?? false) ? 'selected' : ''}}>{{$matricula->curso->nome}}</option>
                                    @endforeach
                                </select>
                            </div>

                        @endif

                        <div class="form-group col-md-7 mb-3">
                            <label for="situacao">Situação</label>
                            <select name="situacao" class="form-control" id="situacao">
                                <option value="">Qualquer situação</option>
                                @foreach ($status ?? [] as $stt)
                                  <option value="{{$stt->id}}" {{$stt->id == ($situacao ?? false) ? 'selected' : ''}} >{{$stt->situacao}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-7  mb-3">
                            <label for="procotolo">Protocolo</label>
                            <input type="text" name="protocolo" class="form-control" id="procotolo" placeholder="Protocolo" value="{{$protocolo ?? ''}}">
                        </div>

                        <div class="w-100"></div>
                          Data de abertura do requerimento
                          <div class="w-100"></div>

                          <div class="row">
                          <div class="col">
                            <label for="dateini"><input type="date" name="data_ini" class="form-control" id="dateini" placeholder="Data Inicial"></label>
                          </div>
                          <div class="row">
                         <p style="margin: 7px;"> a
                         </p> 
                          </div>
                          <div class="col">
                            <label for="datend"><input type="date" name="data_fin" class="form-control" id="datend" placeholder="Data Final"></label>
                          </div>
                        </div>


                  <button type="submit" class="linkBtn btn btnFilter" id="criarReq">Buscar</button>
                <a href="{{ route('requerimento.index')}}" class="linkFilter">Limpar filtro</a>

                </form>
      </div>

        <div id="cont">
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
                  @if(sizeof($dados) < 1)
                    <th colspan="6" class="msgReqVazio">Não encontramos nenhum requerimento :(</th>
                  @endif
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
        {{$dados->links()}}
    </div>
@endsection
