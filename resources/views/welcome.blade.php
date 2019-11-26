<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ReqOn</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/script.js')}}"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                /* background-image: url("{{ asset('img/bg-welcome.jpg') }}"); */
                background-color: #000;
                color: #00061a;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                background-image: url("{{ asset('img/bg-welcome.jpg') }}");
                /* opacity: 0.7; */
                min-height: 90%;
            }

            .title, strong {
                font-size: 84px;
            }

            .links > a ,.carousel-item p{
                color: #00061a;
                padding: 0 25px;
                font-size: 25px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            
            .links > a:hover{
                box-shadow: 0px 5px 0px;
            }
            .links > a:active{
                box-shadow: -5px 5px 0px ;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .carousel-item p{
                padding:100px 200px 100px 200px;
            }
        

        </style>
    </head>
    <body>
        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">

                @if(Auth::guard('funcionario')->check())
                    <a href="{{ url('/indexfunc') }}">Requerimentos</a>
                @elseif(Auth::guard()->check())
                    <a href="{{ url('/requerimento') }}">Requerimentos</a>
                @else
                    <a href="{{ route('login') }}">Entrar</a>
                @endif

                </div>
            @endif -->
            <div class="content contentWelcome">
                <div class="title m-b-md">
                    Req<strong>On</strong>
                </div>

                <div class="links">
                    <a href="/">Inicío</a>
                    <a href="#">Sobre</a>
                    <a href="#">Contato</a>
                    @if (Route::has('login'))

                    @if(Auth::guard('funcionario')->check())
                        <a href="{{ url('/indexfunc') }}">Requerimentos</a>
                    @elseif(Auth::guard()->check())
                        <a href="{{ url('/requerimento') }}">Requerimentos</a>
                    @else
                        <a href="{{ route('login') }}">Entrar</a>
                    @endif
                    @endif
                </div>

                <div class="container">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <p>Abra um requerimento online a qualquer momento</p>
                </div>
                <div class="carousel-item">
                    <p>Acompanhe o status do seu requerimento</p>
                </div>
                <div class="carousel-item">
                    <p>Apoie a redução no uso de papel</p>
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

            </div>
    </body>
</html>
