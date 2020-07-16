@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <p class="row-cols-md-6">
            <a class="btn btn-lg
            btn-success cols-md-6"
               href="{{ route('signup') }}"
               role="button">登入</a>
            <a class="btn btn-lg
            btn-success cols-md-4"
               href="{{ route('signup') }}"
               role="button">登入</a>
        </p>
        <p class="row-cols-md-4">
            <a class="btn btn-lg
            btn-success"
               href="{{ route('signup') }}"
               role="button">登入</a>
        </p>
    </div>
@stop
