@extends('Layouts.app')

@section('Css')
<link rel="stylesheet" href="{{ asset('assets/css/Register.css') }}" />
@endsection

@section('pagetitle','Thank you')

@section('contents')
    <div class="Card layout__center">
        <div class="Card_text">
            会員登録ありがとうございます
        </div>
        <div class="Card_link">
            ログインする
        </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection

