@extends('layouts.app')
@section('content')
<div class="container">
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
    @include('funcionario.det', [$requerimento, $status, $setor, $setorfunc])
</div>
@endsection
