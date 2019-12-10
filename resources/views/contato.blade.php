<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ReqOn</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

      </head>
    <body>

    <div class="header">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm navClassWelcome">
            <div class="container"> 
                <a class="navbar-brand-welcome" href="{{ url('/') }}"><img id="logoSite" src="{{ asset('img/logoSite-verde.png') }}">ReqOn</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="form-inline linksWelcome">
                    @if (Route::has('login'))
                        @if(Auth::guard('funcionario')->check())
                            <a href="{{ url('/indexfunc') }}">REQUERIMENTOS</a>
                        @elseif(Auth::guard()->check())
                            <a href="{{ url('/requerimento') }}">REQUERIMENTOS</a>
                        @else
                            <a href="{{ route('login') }}">ENTRAR</a>
                        @endif
                    @endif
                </div>
            </div>
        </nav>
    </div>

<div class="container">
	<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/requerimento">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contato</li>
        </ol>
    </nav>
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
</body>
</html>