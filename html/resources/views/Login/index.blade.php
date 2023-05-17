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
        <form method="post" action="/login" class="Login">
            @csrf
            <div class="Register_form">
                <input type="email" name='email' placeholder="Email" >
            </div>
            <div class="Register_form">
                <input type="password" name='password' placeholder="Password">
            </div>
            <div class="Register_form">
                <button id='button' type="submit">
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

