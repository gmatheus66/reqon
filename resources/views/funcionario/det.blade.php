<div class="showreq">

        @if($errors->any())
        @foreach($errors->any() as $message)
        <div class="alert alert-danger" role="alert">
         {{ $message }}
       </div>
       @endforeach
       @endif
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
            <div class="" id="cont">
                <form action="{{ route('redirecionar') }}" method="post">
                    @csrf
                    <div class="container-fluid">

                        <div class="col-sm btn-secondary status">
                                {{$requerimento['status']['situacao']}}
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                Semestre
                            </div>
                            <div class="col-sm">
                                Setor
                            </div>
                            <div class="col-sm">
                                Descrição
                            </div>
                            <div class="col-sm">
                                Para o Setor...
                            </div>
                            {{-- <div class="col-sm btn-secondary">
                                {{$requerimento['status']['situacao']}}
                            </div> --}}
                            <div class="w-100"></div>

                            <input type="hidden" name="requerimento" value="{{$requerimento['id']}}">
                            <input type="hidden" name="matricula" value="{{$requerimento['matricula']['id']}}">
                            <input type="hidden" name="subtipo" value="{{$requerimento['subtipo']['id']}}">
                            <input type="hidden" name="setor" value="{{$requerimento['setor']['id']}}">
                            <input type="hidden" name="descricao" value="{{$requerimento['descricao']}}">

                            <div class="col-sm">
                                {{$requerimento['matricula']['semestre']}}
                            </div>
                            <div class="col-sm">
                                {{$requerimento['setor']['nome']}}
                            </div>
                            <div class="col-sm">
                                {{$requerimento['descricao']}}
                            </div>


                        </div>
                        <div class="form-group">
                            <select name="teste" class="selectpicker form-control" >
                                <option value="" selected>Selecione um Setor</option>
                                @foreach ($setor as $set)
                                    <option value="{{$set['id']}}">{{$set['descricao']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="status" class="selectpicker form-control" >
                                <option value="" selected>Selecione uma Situação</option>
                                @foreach ($status as $stt)
                                    <option value="{{ $stt['id'] }}">{{ $stt['nome'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <button class="btn cmt" type="button" id="button-addon1">Comentário</button>
                            </div>
                            <textarea class="form-control comentario" name="comentario" aria-label="Comentario"></textarea>
                        </div>
                        <button type="submit" class="coment-btn">Enviar</button>
                    </div>
                </form>
            {{-- {{$requerimento->setor}} --}}

                @if ($requerimento->funcionario_id == Auth::user()->id)
                    {{Auth::user()->id}}
                @endif

                {{-- <p>{{ $requerimento->children }}</p> --}}
                @foreach ($requerimento->children as $requerimento)
                    @include('funcionario.det', [$requerimento, $status, $setor])
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
