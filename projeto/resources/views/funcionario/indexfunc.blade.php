@extends('layouts.app')


@section('content')

    @foreach ($reqs as $req)
        <p>{{ $req }}</p>
    @endforeach

@endsection
