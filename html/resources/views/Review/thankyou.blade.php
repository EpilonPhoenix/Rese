@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Register.css') }}" />
@endsection

@section('pagetitle','Thank you')

@section('contents')
    <div class="Card layout__center">
        <div class="Card_text">
            レビューありがとうございます
        </div>
        <a href="{{ route('mypage') }}">
            <div class="Card_link">
                マイページへ戻る
            </div>
        </a>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection

