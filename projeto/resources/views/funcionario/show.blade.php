@extends('layouts.app')


@section('content')
    <div class="container">
        <nav aria-label ="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
          </ol>
        </nav>
    </div>
	    <div class="container" id="cont">
			<div class="container-fluid">
                @if($requerimento)
                    @foreach ($requerimento as $req)

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <!-- Card -->
                            <div class="card ex8-card">
                            <!-- Card content -->

                            <div class="card-body">
                                <!-- Title -->
                                <h4 class="card-title"><a>{{$req->subtipo->descricao}}</a></h4>
                                <h6 class="card-title">Protocolo: {{$req->protocolo}}</h6>
                                <h6 class="card-title">Data: {{date('d-m-Y', strtotime($req->created_at))}}</h6>
                                <!-- Text -->
                                <p class="card-text">Descricao: {{$req->descricao}}</p>
                                <p class="card-text">Status: {{$req->status->situacao}}</p>
                            </div>
                            </div>
                            <!-- Card -->
                        </div>
                    </div>
                        @endforeach
                 @endif
            </div>

		</div>

@endsection
