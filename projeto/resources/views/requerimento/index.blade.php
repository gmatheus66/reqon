@extends('layouts.app')


@section('content')

	    <div class="container" id="cont">
			<div class="d-flex align-items-start flex-column bd-highlight mb-3" style="height: 100px;">
			  @if(session('success'))
			  	<div class="alert alert-success" role="alert" id="sucessoReq"><strong>{{session('success')}}</strong></div>
              @endif


              @if($mtsize > 1)

              <form action="{{route('requerimento.create')}}" method="post">
                      <select class="browser-default custom-select custom-select-lg mb-3" name="curso_id">
                              <option selected>Selecione Um curso</option>
                              @foreach ($crs as $i => $curso)
                                    @foreach ($curso as $c)
                                        <option value="{{$c->id}}">{{$c->nome}}</option>
                                    @endforeach
                              @endforeach

                      </select>

              </form>
             @endif

			 <div class="alert alert-success" role="alert" id="criarReq"><a class="reqTxt" href="{{ route('requerimento.create')}}">Criar Requerimento</a></div>
			</div>
		</div>

@endsection
