@extends('layouts.app')

@section('content')

    @foreach($categories as $c)
        {{$c->name}}
    @endforeach


@endsection
