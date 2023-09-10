@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Login.css') }}" />
@endsection

@section('pagetitle','Login')

@section('contents')
    <div class="Card">
        <div class="Card_title">
            <div class="Card_title_text">
                Login
            </div>
        </div>
        <form method="post" action="/login" >
            @csrf
            <div class="row justify-content-center">
                <input type="email" name='email' placeholder="Email" class="col-10 ">
            </div>
            <div class="row justify-content-center">
                <input type="password" name='password' placeholder="Password" class="col-10">
            </div>
            <div class="row justify-content-center">
                <button id='button' type="submit" class="col-10 border-0 bg-primary text-white rounded">
                    ログイン
                </button>
            </div>
        </form>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection

