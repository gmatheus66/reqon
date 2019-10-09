@extends('layouts.app')

@section('content')
    <div class="container">

     <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach($tipo as $tp)
            <li class="nav-item">
                <a class="nav-link" id="{{$tp->descricao}}-tab" data-toggle="tab" href="#{{$tp->descricao}}" role="tab" aria-controls="{{$tp->descricao}}" aria-selected="false">{{$tp->descricao}}</a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="myTabContent">
        @foreach($tipo as $tp)
            @foreach($tp->subtipos as $sub)
            <div class="tab-pane fade" id="{{$tp->descricao}}" role="tabpanel" aria-label="{{$tp->descricao}}-tab">{{$sub->descricao}}</div>
            @endforeach
        @endforeach
        
    </div>
  
    
    
    
    </div>
@endsection