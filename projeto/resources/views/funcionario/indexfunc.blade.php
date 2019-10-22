@extends('layouts.app')

@section('content')
<div class="container">
<div class="card  bg-light mb-3">
  <h5 class="card-header">Requerimentos:</h5>
  <div class="card-body">
     @foreach ($reqs as $req)
    <div>
        <p>{{ $req["protocolo"] }}</p>
        <p>{{ $req["descricao"] }}</p>
        <p>{{ $req["subtipo_id"] }}</p>
    </div>
    @endforeach
     <a href="#" class="btn btn-primary">Detalhes</a>
         </div>
     </div>
</div>
@endsection
