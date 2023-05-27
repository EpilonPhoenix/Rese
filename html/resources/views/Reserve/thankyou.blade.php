@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Register.css') }}" />
@endsection

@section('pagetitle','Thank you')

@section('contents')
    <div class="Card layout__center">
        <div class="Card_text">
            ご予約ありがとうございます
        </div>
        <a href="{{ route('home') }}">
            <div class="Card_link">
                戻る
            </div>
        </a>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection

