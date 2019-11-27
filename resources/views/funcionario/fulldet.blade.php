@extends('layouts.app')
@section('content')
    @include('funcionario.det', [$requerimento, $status, $setor])
@endsection
