@extends('layouts.app')

@section('content')
@if(session('success')=='foi')
<div class="container">
    @foreach ($reqs as $req)
        <div class="card  bg-light mb-3">
            <h5 class="card-header">{{ $req["subtipo_id"] }}</h5>
                <div class="card-body">
                    <div>
                        <p>{{ $req["protocolo"] }}</p>
                        <p>{{ $req["descricao"] }}</p>
                        <p>{{ $req["subtipo_id"] }}</p>
                        <a href="#" class="btn btn-primary">Detalhes</a>
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
