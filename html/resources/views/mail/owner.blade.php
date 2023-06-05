@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Mail.css') }}" />
@endsection

@section('pagetitle','Rese Mailer')

@section('contents')
    <div class="message">
        オーナー{{$user->name}}さんのマイページ
    </div>
    <div class="Titles layout__center">
        <div class="Reserves__title">
            お気に入り登録者へのメール送信
        </div>
    </div>
    <div class="Contents layout__center">
        <form action="/mail/send" method="post" class="layout__center">
            @csrf
            <textarea name="contents" id="" cols="120" rows="20"></textarea><br>
            <button>送信</button>
        </form>
    </div>
        @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection