@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Home.css') }}" />
@endsection

@section('pagetitle','Rese')

@section('contents')
    ユーザー画面
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection

