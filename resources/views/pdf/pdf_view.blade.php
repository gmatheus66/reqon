<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Requerimento</title>
  <style>
      * {
          font-family: sans-serif;
      }
      h1 span {
          color: #999;
          font-size: 0.8em;
      }
      .row{
          margin-top: 3%;
      }
      .p1{
          display: inline;
        }
        .p2{
            margin-left: 5%;

        }
        .row2{
            position: absolute;
            display: inline;
            margin-left: 10%;
            left:65%;

        }
        .child{
            border-bottom: 1px solid black;
        }
        .protocol{
            color: #999;
        }
        .titleReq{
            margin-top: 5%;
        }
        .chl{
            margin-left: 3%;
        }
  </style>
</head>
<body>
    <h1>Requerimento <span>#{{$requerimento->protocolo}}</span></h1>

    <div class="">
            <h3 >Dados do Estudante</h3>
            <div class="row">
                <div class="p1">Matrícula: {{$requerimento['matricula']['matricula']}}</div>
                <div class="p1 p2">Status da matrícula: {{$requerimento['matricula']['status']}}</div>
            </div>
            <div class="row">
                <div class="p1">Curso: {{$requerimento['matricula']['curso']['nome']}}</div>
            </div>
            <div class="row">
                <div class="p1">Nome: {{$requerimento->matricula->aluno->nome}}</div>
                <div class="p1 p2">Semestre: {{$requerimento['matricula']['semestre']}}</div>
            </div>
            <div class="row">
                <div>Tipo: {{$requerimento['subtipo']['descricao']}}</div>
            </div>
    </div>
    <h3 class="titleReq">Detalhes do Requerimento</h3>
    @include('pdf.viewchld', [$requerimento])

</body>
</body>
</html>
