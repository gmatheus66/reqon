@extends('layouts.app')


@section('content')
    <div class="container">
    <div class="container" id="breadcrumb">
            <span class="itemBread"><a href="/">Início</a> ></span>
            <span class="itemBread"><a href="/indexfunc">Requerimentos</a> ></span>
            <span class="breadcrumb-item active itemBread" aria-current="page">Detalhes do Requerimento</span>

    </div>
    </div>
    <div class="showreq">

        <div id="cont">
            <div class="container-fluid">
                @if($requerimento)
                @foreach ($requerimento as $req)

                <div class="row">
                    <div class="col-sm">
                          Protocolo
                        </div>
                        <div class="col-sm">
                            Matrícula
                        </div>
                        <div class="col-sm">
                            Nome do Aluno
                        </div>
                        <div class="col-sm">
                            Curso
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
                            Semestre
                        </div>
                        <div class="col-sm">
                          Status da matrícula
                        </div>
                        <div class="col-sm">
                            Setor
                        </div>
                        <div class="col-sm">
                          Descrição
                        </div>
                        <div class="w-100"></div>

                        <div class="col-sm">
                          {{$req['protocolo']}}
                        </div>
                        <div class="col-sm">
                            {{$req['matricula']['matricula']}}
                        </div>
                        <div class="col-sm">
                            {{$req->matricula->aluno->nome}}
                        </div>
                        <div class="col-sm">
                            {{$req->matricula->curso->nome}}
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
                            {{$req['matricula']['semestre']}}
                        </div>
                        <div class="col-sm">
                            {{$req['matricula']['status']}}
                        </div>
                        <div class="col-sm">
                            {{$req['setor']['nome']}}
                        </div>
                        <div class="col-sm">
                            {{$req['descricao']}}
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
        <hr class="my-4">
        <div class="" id="cont">
            <form action="{{ route('redirecionar') }}" method="post">
                @csrf
                <div class="container-fluid">

                    @if($reqpai)
                        @foreach ($reqpai as $req)
                            <div class="col-sm btn-secondary status">
                                    {{$req['status']['situacao']}}
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    Semestre
                                </div>
                                <div class="col-sm">
                                    Setor
                                </div>
                                <div class="col-sm">
                                    Descrição
                                </div>
                                <div class="col-sm">
                                    Para o Setor...
                                </div>
                                {{-- <div class="col-sm btn-secondary">
                                    {{$req['status']['situacao']}}
                                </div> --}}
                                <div class="w-100"></div>

                                <input type="hidden" name="requerimento" value="{{$req['id']}}">
                                <input type="hidden" name="matricula" value="{{$req['matricula']['id']}}">
                                <input type="hidden" name="subtipo" value="{{$req['subtipo']['id']}}">
                                <input type="hidden" name="status" value="{{$req['status']['id']}}">
                                <input type="hidden" name="setor" value="{{$req['setor']['id']}}">
                                <input type="hidden" name="descricao" value="{{$req['descricao']}}">

                                <div class="col-sm">
                                    {{$req['matricula']['semestre']}}
                                </div>
                                <div class="col-sm">
                                    {{$req['setor']['nome']}}
                                </div>
                                <div class="col-sm">
                                    {{$req['descricao']}}
                                </div>
                                    <div class="form-group">
                                        <select name="teste" class="selectpicker form-control" >
                                            <option value="1">CRADT</option>
                                            <option value="2">COORDENAÇÃO</option>
                                            <option value="3">DAEECINFO</option>
                                            <option value="4">CINFO</option>
                                        </select>
                                    </div>


                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <button class="btn cmt" type="button" id="button-addon1">Comentário</button>
                                </div>
                                <textarea class="form-control comentario" name="comentario" aria-label="Comentario"></textarea>
                            </div>

                            <button type="submit" class="coment-btn">Enviar</button>
                        @endforeach
                    @else
                        <p>teste</p>
                    @endif
                </div>
            </form>
        </div>
@endsection
