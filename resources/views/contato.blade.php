@extends('layouts.app')

@section('content')
<div class="container">
	<h1 class="titleReq">Contato</h1>
	<form>
	  <div class="form-row">
	  	<div class="form-group col-md-6">
	      <label for="nome">Nome completo</label>
	      <input type="text" class="form-control" id="nome">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="email">Email</label>
	      <input type="email" class="form-control" id="email">
	    </div>
	    <div class="form-group col-lg-12">
	      <label for="mensagem">Mensagem</label>
	      <textarea class="form-control" maxlength="1000" rows="10" id="mensagem"></textarea>
	    </div>
	  </div>
	  
	  <button type="submit" id="enviarMsg" class="btn btn-outline-primary">Enviar</button>
	</form>
</div>
@endsection
