<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ReqOn</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style type="text/css">
            body{
                background-color: #000;
                background-size:cover;
                background-position: center;
                background-image: url({{asset('img/bg-welcome.jpg')}});
            }
            .footerClass{
                background-color: #fff;
                color: #3d9476;
            }
            .linkFooter a{
                color:#4bb18d;
            }
            .linkFooter a:hover{
                color:#328064;
            }
            .titleFooter{
                color:#3d9476;
            }
            
        </style>
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
        <p class="nomeSite">ReqOn</p>
    </div>
    <div class="container welcomeCont d-flex align-content-end flex-wrap">
        <div class="card-deck">
            <div class="card">
              <div class="card-body bCard">
                <img src="{{ asset('img/icon1.png') }}">
                <h5 class="card-title tituloCard">Prático</h5>
                <p class="card-text tCard">Abra um requerimento online a qualquer momento, de forma prática e rápida.</p>
              </div>
            </div>
            <div class="card">
              <div class="card-body bCard">
                <img src="{{ asset('img/icon2.png') }}">
                <h5 class="card-title tituloCard">Acompanhamento</h5>
                <p class="card-text tCard">Acompanhe o status do seu requerimento e descubra se ele já foi deferido, em que setor está, dentre outras informações.</p>
              </div>
            </div>
            <div class="card">
              <div class="card-body bCard">
                <img src="{{ asset('img/icon3.png') }}">
                <h5 class="card-title tituloCard">Papel</h5>
                <p class="card-text tCard">Apoie a redução no uso de papel.</p>
              </div>
            </div>
        </div>
        </div>
        @include('footer')
    </body>
</html>