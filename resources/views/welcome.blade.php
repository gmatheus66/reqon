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

            .links > a , p{
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
            p{
                padding:100px 200px 100px 200px;
            }
        </style>
    </head>
    <body>
    <header >
        @include('menu')
    </header>
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
            <div class="content">
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
                    @endif
                    @endif
                </div>

                <div class="container">
                    <div id="carouselContent" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active text-center p-4">
                                <p>Abra um requerimento online a qualquer momento</p>
                            </div>
                            <div class="carousel-item text-center p-4">
                                <p>Acompanhe o status do seu requerimento</p>
                            </div>
                            <div class="carousel-item text-center p-4">
                                <p>Apoie a redução no uso de papel</p>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>

            </div>
        <footer>
            @include('footer')
        </footer>
    </body>
</html>
