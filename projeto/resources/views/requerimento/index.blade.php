@extends('layouts.app')


@section('content')
    <div class="contanier">

    <a href="{{ route('requerimento.create')}}">Criar Requerimento</a>

    @if(session()->get('sucesso'))
        <div class="alert alert-info" role="alert">
            {{ session()->get('sucesso') }}  
        </div>
    @endif
    </div>
@endsection