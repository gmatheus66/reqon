@extends('layouts.app')

@section('content')
@if(session('success')==true)
<div class="container">
<div class="container" id="breadcrumb">
            <span class="itemBread"><a href="/">Início</a> ></span>
            <span class="breadcrumb-item active itemBread" aria-current="page">Requerimento</span>

    <div>

        <form action="{{route('pesquisarfunc')}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="tipo">Filtro</label>
                    <input type="text" name="tipo" class="form-control" id="tipo" placeholder="Filtrar por Tipo">
                </div>
                <button type="submit" class="linkBtn btn btn-outline-primary" id="criarReq">Filtrar</button>
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
    @else
        @php
            return redirect()->back()->withErrors('Você não está logado');
        @endphp
    @endif
</div>
    {{$reqs->links()}}
@endsection
