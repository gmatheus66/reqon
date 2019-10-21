@extends('layouts.app')


@section('content')

	    <div class="container" id="cont">
			<div class="d-flex align-items-start flex-column bd-highlight mb-3" style="height: 100px;">
			  @if(session('success'))
			  	<div class="alert alert-success" role="alert" id="sucessoReq"><strong>{{session('success')}}</strong></div>
			  @endif
			 <div class="alert alert-success" role="alert" id="criarReq"><a class="reqTxt" href="{{ route('requerimento.create')}}">Criar Requerimento</a></div>
			</div>
		</div>

@endsection
