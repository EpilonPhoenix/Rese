@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Register.css') }}" />
@endsection

@section('pagetitle','Registration')

@section('contents')
    <div class="Card">
        <div class="Card_title">
            <div class="Card_title_text">
                Registration
            </div>
        </div>
        <form method="post" action="/login" class="Login">
            @csrf
            @csrf
            <div class="Register_form">
                <input type="text" name='name' placeholder="Username" >
            </div>
            <div class="Register_form">
                <input type="email" name='email' placeholder="Email" >
            </div>
            <div class="Register_form">
                <input type="password" name='password' placeholder="Password">
            </div>
            <div class="Register_form">
                <input type="password" name='password_confirmation' placeholder="Password(Remind)">
            </div>
            <div class="Register_form">
                <button id='button' type="submit">
                    登録
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
