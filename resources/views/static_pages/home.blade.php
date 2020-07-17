@extends('layouts.default')

@section('content')
    @if (Auth::check())
        <div class="row">
            <div class="col-md-8">
                <section class="status_form">
                    @include('shared._status_form')

                </section>
                <h4>微博列表</h4>
                <hr>
                @include('shared._feed')
            </div>
            <aside class="col-md-4">
                <section class="user_info">
                    @include('shared._user_info', ['user' => Auth::user()])
                </section>
            </aside>
        </div>
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
    @else
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
    @endif
@stop
