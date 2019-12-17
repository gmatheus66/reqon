<div class="chl">

    <div class="row">
        <span class="p1">{{$requerimento['setor']['nome']}}</span>
        <span class="p1 p2">({{date('d-m-Y', strtotime($requerimento['created_at']))}})</span>
        <div class="row2">
            <span class="p1 protocol">#{{$requerimento['protocolo']}}</span>
            <span class="p1 p2">{{$requerimento['status']['situacao']}}</span>
        </div>
    </div>

    <div class="child">

    <p class="p-1">
        <span>Descrição</span>  {{$requerimento['descricao']}}
    </p>
    @if($requerimento->comentario)
    <p class="answer p-1">
        <span>Comentario: </span>{{$requerimento->comentario}}
    </p>
    @endif
</div>

@foreach ($requerimento->children as $requerimento)
@include('pdf.viewchld', [$requerimento])
@endforeach
</div>
