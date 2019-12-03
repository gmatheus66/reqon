<div class="showreq">


        <h1 class="titleReq">Detalhes do Requerimento</h1>

       <h3 class="subTitleReq">Dados do Estudante</h3>

       <div class="">
            <div class="row">
                <div class="col-sm">Matrícula: {{$requerimento['matricula']['matricula']}}</div>
                <div class="col-sm">Status da matrícula: {{$requerimento['matricula']['status']}}</div>
                <div class="col-sm">Curso: {{$requerimento['matricula']['curso']['nome']}}</div>
            </div>
            <div class="row">
                <div class="col-sm-8">Nome: {{$requerimento->matricula->aluno->nome}}</div>
                <div class="col-sm-4">Semestre: {{$requerimento['matricula']['semestre']}}</div>
            </div>
        </div>

        <div class="dadosreq"><h3 class="subTitleReq">Dados do Requerimento</h3></div>

        <div class="">
           <div class="row">
             <div class="col">Tipo: {{$requerimento['subtipo']['descricao']}}</div>
             <div class="col">Situação: <h5 class="{{Str::slug($requerimento['status']['situacao'])}}" >{{$requerimento['status']['situacao']}}</h5></div>
             <div class="col">Data: {{date('d-m-Y', strtotime($requerimento['created_at']))}}</div>
           </div>
           <div class="row">
               <div class="col col-sm-8">Descrição:</div>
               <div class="col">Setor:  {{$requerimento['setor']['nome']}}</div>
                 <div class="w-100"></div> <!-- força a quebra de linha -->
               <div class="col col-sm-8">{{$requerimento['descricao']}}</div>
               <div class="col">Protocolo: {{$requerimento['protocolo']}}</div>
           </div>
           @if($requerimento->comentario)
            <div class="row">
                    <div class="col">Comentario: {{$requerimento->comentario}}</div>
                </div>
           @endif
        </div>

        <div id="btn-action">
            <div class="row">
                <button id="btn-encaminhar" class="coment-btn btn-lg col ">Encaminhar</button>
                <button id="btn-responder" class="coment-btn btn-lg col ">Responder</button>
            </div>
        </div>
        <div id="action-responder" style="display: none">
                <h3 class="subTitleReq">Responder</h3>
                <div class="">
                    <form action="{{ route('redirecionar') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col">
                                <select name="teste" class="selectpicker form-control" >
                                    <option value="" selected>Selecione um Status</option>
                                    @foreach ($status as $set)
                                        <option value="{{$set['id']}}">{{$set['situacao']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <input type="hidden" name="requerimento" value="{{$requerimento['id']}}">
                            <input type="hidden" name="matricula" value="{{$requerimento['matricula']['id']}}">
                            <input type="hidden" name="subtipo" value="{{$requerimento['subtipo']['id']}}">
                            <input type="hidden" name="status" value="{{$requerimento['status']['id']}}">
                            <input type="hidden" name="setor" value="{{$requerimento['setor']['id']}}">
                            <input type="hidden" name="descricao" value="{{$requerimento['descricao']}}">

                        </div>
                        <div class="row">
                            <div class="input-group col">
                                <div class="input-group-prepend">
                                    <button class="btn cmt" type="button" id="button-addon1">Comentário</button>
                                    </div>
                                    <textarea class="form-control comentario" name="comentario" aria-label="Comentario"></textarea>
                                </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="coment-btn btn-lg col col-sm-2">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        <div id="action-encaminhar" style="display: none">
            <h3 class="subTitleReq">Encaminhar</h3>
            <div class="">
                <form action="{{ route('redirecionar') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col">
                            <select name="teste" class="selectpicker form-control" >
                                <option value="" selected>Selecione um Setor</option>
                                @foreach ($setor as $set)
                                    @foreach ($setorfunc as $setfunc)
                                        @if ($set['id'] != $setfunc['setor_id'])
                                            <option value="{{$set['id']}}">{{$set['nome']}}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="requerimento" value="{{$requerimento['id']}}">
                        <input type="hidden" name="matricula" value="{{$requerimento['matricula']['id']}}">
                        <input type="hidden" name="subtipo" value="{{$requerimento['subtipo']['id']}}">
                        <input type="hidden" name="status" value="{{$requerimento['status']['id']}}">
                        <input type="hidden" name="setor" value="{{$requerimento['setor']['id']}}">
                        <input type="hidden" name="descricao" value="{{$requerimento['descricao']}}">

                    </div>
                    <div class="row">
                        <div class="input-group col">
                            <div class="input-group-prepend">
                                <button class="btn cmt" type="button" id="button-addon1">Comentário</button>
                                </div>
                                <textarea class="form-control comentario" name="comentario" aria-label="Comentario"></textarea>
                            </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="coment-btn btn-lg col col-sm-2">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

                {{-- <p>{{ $requerimento->children }}</p> --}}
                @foreach ($requerimento->children as $requerimento)
                    @include('funcionario.det', [$requerimento, $status, $setor, $setorfunc])
                @endforeach
</div>
