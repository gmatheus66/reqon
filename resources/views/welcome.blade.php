<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style type="text/css">
            body{
                background-color: #000;
                background-size:cover;
                background-image: url({{asset('img/bg-welcome2.jpg')}});
            }
            .my-nav{
                position: absolute!important;
                width: 100%!important;
                z-index:999!important;
                background:none!important;
                border:0!important;
                border-radius: 0!important;
            }
            .my-carousel{
                position: absolute!important;
                top:0!important;
            }
            .linksWelcome > a{
                font-size:20px;
                color:#4bb18d;
                font-family: 'Titillium Web', sans-serif;
                margin: 15px;
            }
            .linksWelcome > a:hover{
                color:#328064;
                text-decoration:none;
            }
            .carousel-item{
               height: 100vh;
            }
            .carousel-item > p{
                position:absolute;
                top:-10;
            }
            .ReqOn{
                position: absolute;
                z-index:1;
                text-align: center;
                top:4%;
                font-family: "Open Sans", sans-serif;
                font-size:6vh;
                color:#37bf8f;
                left: 0;
                right: 0;

            }
            .carousel-caption > p{
                font-size:3vh;
                color:#4bb18d;
                margin-bottom: 200px;
                margin-left: 20%;
                margin-right: 20%;
            }
            .carousel-control-next .carousel-control-prev{
                z-index: 2;
            }
            #logoVerde{
                width: 10vh;
            }
        </style>
    </head>
    <body>

    <div class="header">
        <nav class="my-nav navbar navbar-expand-lg navbar-light bg-light">
          <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-lg-0 linksWelcome">
                    <a href="/">INÍCIO</a>
                    <a href="#">SOBRE</a>
                    <a href="#">CONTATO</a>
                    @if (Route::has('login'))
                        @if(Auth::guard('funcionario')->check())
                            <a href="{{ url('/indexfunc') }}">REQUERIMENTOS</a>
                        @elseif(Auth::guard()->check())
                            <a href="{{ url('/requerimento') }}">REQUERIMENTOS</a>
                        @else
                            <a href="{{ route('login') }}">ENTRAR</a>
                        @endif
                    @endif
            </form>
          </div>
        </nav>
            
          <span class="ReqOn"><img id="logoVerde" src="{{ asset('img/logoSite-verde.png') }}">ReqOn</span>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">      
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption">
                            <p>Abra um requerimento online a qualquer momento, de forma prática e rápida.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <p>Acompanhe o status do seu requerimento e descubra se ele já foi deferido, em que setor está, dentre outras informações.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <p>Apoie a redução no uso de papel.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <!-- <span class="sr-only">Previous</span> -->
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <!--   <span class="sr-only">Next</span> -->
                </a>
            </div>

    </body>
</html>