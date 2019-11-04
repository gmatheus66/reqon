@extends('layouts.app')

@section('content')
@if(session('success')=='foi')
<div class="container">
    @foreach ($reqs as $req)
    <div class="card  bg-light mb-3">
        <h5 class="card-header">{{ $req['subtipo']->descricao }}</h5>
            <div class="card-body">
                <div class="style">
                    <p>Protocolo: {{ $req["protocolo"] }}</p>
                    <p>Matricula: {{ $req["matricula"]->matricula }}</p>
                    <p>Status: {{ $req["status"]->situacao }}</p>
                    <p>Data: {{date('d-m-Y', strtotime($req->created_at))}}</p>
                <a href="{{ route('showreqfunc',$req->id)}}" class="btn btn-primary">Detalhes</a>
                </div>
            </div>
    </div>

        @endforeach
    @else
        @php
            return redirect()->back()->withErrors('Você não está logado');
        @endphp
    @endif
</div>
@endsection
