@extends('layouts.app')
@section('content')
    @include('funcionario.det', [$requerimento, $status])
@endsection
