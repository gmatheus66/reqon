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
              <li class="breadcrumb-item active" aria-current="page">Sobre</li>
          </ol>
      </nav>

        <h1 class="titleReq">Nosso Governo é Eletrônico!</h1>
        <p class="subtitleFunc">Temos como prioridade facilitar e modernizar o processo de requerimentos institucionais.</p>

    <div class="container">

        <!-- Three columns of featurettes -->
        <div class="row">
          <div class="col-lg-4">
            <img class="imageFunc" style="width: 200px;" src="{{ asset('img/icon1.png') }}">
            <h3 class="tituloCard">Crie seu requerimento <span class="text-muted">Rápido e Online.</span></h3>
            <p class="tCard">A criação do requerimento pode ser feita de maneira rápida, descomplicada e de maneira 100% digital.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="imageFunc" style="width: 200px;" src="{{ asset('img/icon3.png') }}">
            <h3 class="tituloCard">Chega de Papel <span class="text-muted">Praticidade para todos.</span></h3>
            <p class="tCard">Queremos digitalizar todo o processo de criação e tramitação dos requerimentos, reduzindo o consumo e desperdício de papel.</p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="imageFunc" style="width: 200px;" src="{{ asset('img/icon2.png') }}">
            <h3 class="tituloCard">Acompanhe tudo online <span class="text-muted">Mobilidade para você.</span></h3>
            <p class="tCard">Acompanhe de qualquer lugar o status dos seus requerimentos, fique por dentro dos detalhes em tempo real.</p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

        <!-- /END THE featS -->
</div>

        <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <div class="container py-3">
            <div class="row text-center">
              <div class="col-lg-8 mx-auto">
                <h1 class="tituloFunc">CONHEÇA NOSSA EQUIPE</h1>
              </div>
            </div>
          </div>

        <!-- Page Content -->
        <div class="container">
        <div class="row">
            <!-- Team Member 1 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body text-center">
                <img src="https://avatars1.githubusercontent.com/u/43681132?v=4" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0 tituloCard">Aline Venceslau</h5>
                <div class="tCard">Web Developer</div>
                <ul class="social mb-0 list-inline mt-3">
                  <li class="list-inline-item"><a href="https://github.com/alinevenceslau" class="social-link"><i class="fa fa-github"></i></a></li>
                  <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                </div>
            </div>
            </div>
            <!-- Team Member 2 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body text-center">
                <img src="https://avatars2.githubusercontent.com/u/44672949?v=4" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0 tituloCard">Guilherme Lira</h5>
                <div class="tCard">Web Developer</div>
                <ul class="social mb-0 list-inline mt-3">
                  <li class="list-inline-item"><a href="https://github.com/GuileSuica" class="social-link"><i class="fa fa-github"></i></a></li>
                  <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                </div>
            </div>
            </div>
            <!-- Team Member 3 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body text-center">
                <img src="https://avatars1.githubusercontent.com/u/48837806?v=4" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0 tituloCard">Juciele Fernandes</h5>
                <div class="tCard">Web Developer</div>
                <ul class="social mb-0 list-inline mt-3">
                  <li class="list-inline-item"><a href="https://github.com/jucielefernandes" class="social-link"><i class="fa fa-github"></i></a></li>
                  <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                </div>
            </div>
            </div>
            <!-- Team Member 4 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
              <div class="card-body text-center">
                  <img src="https://avatars2.githubusercontent.com/u/48837658?v=4" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0 tituloCard">Leonardo Fernandes</h5>
                <div class="tCard">Web Developer</div>
                <ul class="social mb-0 list-inline mt-3">
                  <li class="list-inline-item"><a href="https://github.com/leonardolfp" class="social-link"><i class="fa fa-github"></i></a></li>
                  <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                </div>
            </div>
            </div>
            <!-- Team Member 5 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
              <div class="card-body text-center">
                  <img src="https://avatars3.githubusercontent.com/u/16937847?v=4" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0 tituloCard">Matheus Gonçalves</h5>
                <div class="tCard">Web Developer</div>
                <ul class="social mb-0 list-inline mt-3">
                  <li class="list-inline-item"><a href="https://github.com/gmatheus66" class="social-link"><i class="fa fa-github"></i></a></li>
                  <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                </div>
            </div>
            </div>
            <!-- Team Member 6 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
              <div class="card-body text-center">
                  <img src="https://avatars3.githubusercontent.com/u/48961500?v=4" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0 tituloCard">Morgana Albuquerque</h5>
                <div class="tCard">Web Developer</div>
                <ul class="social mb-0 list-inline mt-3">
                  <li class="list-inline-item"><a href="https://github.com/K0rgana" class="social-link"><i class="fa fa-github"></i></a></li>
                  <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                </div>
            </div>
            </div>
            <!-- Team Member 7 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
              <div class="card-body text-center">
                  <img src="https://avatars1.githubusercontent.com/u/45100619?v=4" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0 tituloCard">Pedro Marinho</h5>
                <div class="tCard">Web Developer</div>
                <ul class="social mb-0 list-inline mt-3">
                  <li class="list-inline-item"><a href="https://github.com/pphenriquesm" class="social-link"><i class="fa fa-github"></i></a></li>
                  <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                </div>
            </div>
            </div>
            <!-- Team Member 8 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
              
              <div class="card-body text-center">
                  <img src="https://avatars2.githubusercontent.com/u/40182898?v=4" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0 tituloCard">Renisson Silva</h5>
                <div class="tCard">Web Developer</div>
                <ul class="social mb-0 list-inline mt-3">
                  <li class="list-inline-item"><a href="https://github.com/RenissonSilva" class="social-link"><i class="fa fa-github"></i></a></li>
                  <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                </div>
            </div>
            </div>
        </div><!-- /.row -->

        </div><!-- /.container -->

  </div><!-- End -->
</div><!-- End container-->
</div>
    @include('footer')
    </body>
</html>