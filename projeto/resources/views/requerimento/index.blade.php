@extends('layouts.app')


@section('content')
    <div class="contanier">

    <a href="{{ route('requerimento.create')}}">Criar Requerimento</a>
    <ul>
        @foreach($requerimento as $req)
            <li>{{$req}}</li>
        @endforeach
    
    </ul>
    
    </div>
@endsection