@extends('layouts.app')


@section('content')

    <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Nosso Governo é Eletrônico!</h1>
        <p class="lead subTitleReq">Temos como prioridade facilitar e modernizar o processo de requerimentos instintitucionais.</p>
    </div>
    </div>

    <div class="container">
        <!-- START THE FEATURETTES -->
        
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading tituloCard">Crie seu requerimento - <span class="text-muted">Rápido e Online.</span></h2>
            <p class="lead tCard">A criação do requerimento pode ser feita de maneira rápida, descomplicada e de maneira 100% digital.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image" style="width: 200px;" src="{{ asset('img/icon1.png') }}">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading tituloCard">Chega de Papel - <span class="text-muted">Praticidade para todos.</span></h2>
            <p class="lead tCard">Queremos digitalizar todo o processo de criação e tramitação dos requerimentos, reduzindo o consumo e desperdicio de papel.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image" style="width: 200px;" src="{{ asset('img/icon3.png') }}">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading tituloCard">Acompanhe tudo online - <span class="text-muted">Moblidade para você</span></h2>
            <p class="lead tCard">Acompanhe de qualquer lugar o status dos seus requerimentos, fique por dentro dos detalhes em tempo real.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image" style="width: 200px;" src="{{ asset('img/icon2.png') }}">
          </div>
        </div>

        <!-- /END THE FEATURETTES -->
</div>

        <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Conheça a nossa equipe</h1>
        </div>
        </div>

        <!-- Page Content -->
        <div class="container">
        <div class="row">
            <!-- Team Member 1 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <!-- <img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="..."> -->
                <div class="card-body text-center">
                <h5 class="card-title mb-0 tituloCard">Aline Valença</h5>
                <div class="card-text text-black-50 tCard">Web Developer</div>
                </div>
            </div>
            </div>
            <!-- Team Member 2 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <!-- <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="..."> -->
                <div class="card-body text-center">
                <h5 class="card-title mb-0 tituloCard">Guilherme Lira</h5>
                <div class="card-text text-black-50 tCard">Web Developer</div>
                </div>
            </div>
            </div>
            <!-- Team Member 3 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <!-- <img src="https://source.unsplash.com/sNut2MqSmds/500x350" class="card-img-top" alt="..."> -->
                <div class="card-body text-center">
                <h5 class="card-title mb-0 tituloCard">Juciele Fernandes</h5>
                <div class="card-text text-black-50 tCard">Web Developer</div>
                </div>
            </div>
            </div>
            <!-- Team Member 4 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <!-- <img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="..."> -->
                <div class="card-body text-center">
                <h5 class="card-title mb-0 tituloCard">Leonardo Fernandes</h5>
                <div class="card-text text-black-50 tCard">Web Developer</div>
                </div>
            </div>
            </div>
            <!-- Team Member 5 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <!-- <img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="..."> -->
                <div class="card-body text-center">
                <h5 class="card-title mb-0 tituloCard">Matheus Gonçalves</h5>
                <div class="card-text text-black-50 tCard">Web Developer</div>
                </div>
            </div>
            </div>
            <!-- Team Member 6 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <!-- <img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="..."> -->
                <div class="card-body text-center">
                <h5 class="card-title mb-0 tituloCard">Morgana Albuquerque</h5>
                <div class="card-text text-black-50 tCard">Web Developer</div>
                </div>
            </div>
            </div>
            <!-- Team Member 7 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <!-- <img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="..."> -->
                <div class="card-body text-center">
                <h5 class="card-title mb-0 tituloCard">Pedro Marinho</h5>
                <div class="card-text text-black-50 tCard">Web Developer</div>
                </div>
            </div>
            </div>
            <!-- Team Member 8 -->
            <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <!-- <img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="..."> -->
                <div class="card-body text-center">
                <h5 class="card-title mb-0 tituloCard">Renisson Silva</h5>
                <div class="card-text text-black-50 tCard">Web Developer</div>
                </div>
            </div>
            </div>
        </div>
        <!-- /.row -->

        </div>
        <!-- /.container -->

@endsection