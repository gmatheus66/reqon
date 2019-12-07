
<div class="showreq child">

    <div class="child-header d-flex justify-content-between">
    <div class="icon @if($open) collapse @else expand @endif" data-body="#body-{{$requerimento->id}}"></div>
        <div class="p-1">
            <span class="setor">{{$requerimento['setor']['nome']}}</span>
            <span class="date">({{date('d-m-Y', strtotime($requerimento['created_at']))}})</span>
        </div>
        <div class="p-1">
            <span class="protocol">#{{$requerimento['protocolo']}}</span>
            <span class="status-bol status-{{Str::slug($requerimento['status']['situacao'])}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="status badge">{{$requerimento['status']['situacao']}}</span>
        </div>
    </div>
    <div class="child-body container-flex" id="body-{{$requerimento->id}}" @if(!$open) style="display:none" @endif>
        <p class="p-1">
            {{$requerimento['descricao']}}
        </p>
        @if($requerimento->comentario)
            <p class="answer p-1">
                {{$requerimento->comentario}}
            </p>
        @endif
        <div class="row">
            <div class="col-6">
                <button class="btn-action btn btn-block btn-primary" data-form="#encaminhar-{{$requerimento->id}}">Encaminhar</button>
            </div>
            <div class="col-6">
                <button class="btn-action btn btn-block btn-secondary" data-form="#responder-{{$requerimento->id}}">Responder</button>
            </div>
        </div>

        <div class="form-action" id="responder-{{$requerimento->id}}" style="display: none">
            <h3 class="subTitleReq">Responder</h3>
            <div class="">
                <form action="{{ route('resposta') }}" method="post">
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
        <div class="form-action" id="encaminhar-{{$requerimento->id}}" style="display: none">
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

        @foreach ($requerimento->children as $requerimento)
            @php
                $open = false
            @endphp
            @include('det', [$requerimento, $status, $setor, $setorfunc, $open])
        @endforeach
    </div>
</div>
