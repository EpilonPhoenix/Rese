@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Home.css') }}" />
@endsection

@section('pagetitle','Thank you')

@section('contents')
    <div class="Card layout__center">
        <div class="Card_text">
            ご予約ありがとうございます
        </div>
        <div class="Card_link">
            戻る
        </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection

