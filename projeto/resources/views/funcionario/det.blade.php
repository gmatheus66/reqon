<div class="showreq">

        <div id="cont">
            <div class="container-fluid">
                @if($requerimento)

                <div class="row">
                    <div class="col-sm">
                          Protocolo
                        </div>
                        <div class="col-sm">
                          Data
                        </div>
                        <div class="col-sm">
                            Situação
                        </div>
                        <div class="col-sm">
                            Setor
                        </div>
                        <div class="col-sm">
                          Descrição
                        </div>
                        <div class="w-100"></div>

                        <div class="col-sm">
                          {{$requerimento['protocolo']}}
                        </div>
                        <div class="col-sm">
                          {{date('d-m-Y', strtotime($requerimento['created_at']))}}
                        </div>
                        <div class="col-sm">
                            {{$requerimento['status']['situacao']}}
                        </div>
                        <div class="col-sm">
                            {{$requerimento['setor']['nome']}}
                        </div>
                        <div class="col-sm">
                            {{$requerimento['descricao']}}
                        </div>
                </div>
                <hr class="my-4">

                {{-- <p>{{ $requerimento->children }}</p> --}}
                @foreach ($requerimento->children as $requerimento)
                    @include('funcionario.det', $requerimento)
                @endforeach
            @endif
        </div>
    </div>
</div>
