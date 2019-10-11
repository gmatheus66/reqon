@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-sm-8 offset-sm-2">
			<h1 class="display-6">Adicione um Requerimento</h1>
	    <div>
        <form action="{{ route('requerimento.store') }}" method="post">
            @csrf
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($tipo as $tp)
                    <li class="nav-item">
                        <a class="nav-link" id="{{$tp->descricao}}-tab" data-toggle="tab" href="#{{$tp->descricao}}" role="tab" aria-controls="{{$tp->descricao}}" aria-selected="false">{{$tp->descricao}}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach($tipo as $tp)
                    <div class="tab-pane fade sub" id="{{$tp->descricao}}" role="tabpanel" aria-label="{{$tp->descricao}}-tab">
                    @foreach($tp->subtipos as $sub)
                        <input type="radio" id="sub-{{$sub->id}}" name="subtipo" value="{{$sub->id}}">
                        <label for="sub-{{$sub->id}}">
                            {{$sub->descricao}}
                        </label>
                        </br>
                    @endforeach
                    </div>
                @endforeach
                
            </div>

            <div class="form-group">
                <label for="Descricao">Descrição:</label>
                <textarea class="form-control rounded-0" id="descricao" rows="6" name="descricao"></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Criar Requerimento</button>    
        
        </form>
  
    
    
    
    </div>
@endsection