@extends('Layouts.app')

@section('Css')
<link rel="stylesheet" href="{{ asset('assets/css/Register.css') }}" />
@endsection

@section('pagetitle','Attention')

@section('contents')
    <div class="Card layout__center">
        <div class="Card_text">
            受信したメールを確認して、メール認証を完了して下さい。
        </div>
        <div class="Card_link" disable>
            ログインする
        </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection