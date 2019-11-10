@extends('layouts.app')


@section('content')
    <script src="http://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
    </script>
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
            <div>

                <form action="{{route('pesquisar')}}" method="post">
                    <script>
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-Token': $('input[name="_token"]').val()
                            }
                        });

                        $('#criarReq').click( (el) => {
                            el.preventDefault();

                            var nome = jQuery('#tipo').val();

                            $.ajax({
                                type: 'post',
                                data: {
                                    nome: nome
                                },
                                success: (data) => {
                                    alert(data.success);
                                }
                            })
                        });

                    </script>
                    @csrf
                        <div class="form-group">
                            <label for="tipo">Filtro</label>
                            <input type="text" name="tipo" class="form-control" id="tipo" placeholder="Filtrar por Tipo">
                        </div>
                        <button type="submit" class="linkBtn btn btn-outline-primary" id="criarReq">Filtrar</button>
                </form>

            </div>
                    <div class="div-req">

                <a href="{{ route('requerimento.create')}}"><button class="linkBtn btn btn-outline-primary" id="criarReq">Criar Requerimento</button></a>
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
