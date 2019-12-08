@extends('layouts.app')
@section('content')
<div id="main" class="container">
    <div class="container">
        <div class="container" id="breadcrumb">
            <span class="itemBread"><a href="/">Início</a> ></span>
            <span class="itemBread"><a href="/indexfunc">Requerimentos</a> ></span>
            <span class="breadcrumb-item active itemBread" aria-current="page">Detalhes</span>
        </div>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $message)
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
       @endforeach
    @endif
    @if(session('success'))
        <div class="alert alert-success msgSucesso msgsuccess" role="alert" id="sucessoReq"><strong>{{session('success')}}</strong><button type="button" class="close" data-dismiss="alert">x</button></div>
    @endif
    <h1 class="titleReq">Detalhes do Requerimento</h1>

    <h3 class="subTitleReq">Dados do Estudante</h3>

    <div class="">
        <div class="row">
            <div class="col-sm">Matrícula: {{$requerimento['matricula']['matricula']}}</div>
            <div class="col-sm">Status da matrícula: {{$requerimento['matricula']['status']}}</div>
            <div class="col-sm">Curso: {{$requerimento['matricula']['curso']['nome']}}</div>
        </div>
        <div class="row">
            <div class="col-sm-8">Nome: {{$requerimento->matricula->aluno->nome}}</div>
            <div class="col-sm-4">Semestre: {{$requerimento['matricula']['semestre']}}</div>
        </div>
        <div class="row">
            <div class="col">Tipo: {{$requerimento['subtipo']['descricao']}}</div>
        </div>
    </div>


    @php
        $open = true;
    @endphp
    @if(Auth::guard('funcionario')->check())
        @include('det', [$requerimento, $status, $setor, $setorfunc, $open])
    @elseif(Auth::guard()->check())
        @include('det', [$requerimento, $status, $setor, $open])
    @endif
</div>
@endsection
