@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Mypage.css') }}" />
@endsection

@section('pagetitle','Rese Mypage')

@section('contents')
    <div class="message">
        オーナー{{$user->name}}さんのマイページ
    </div>
    <div class="Titles layout__center-row">
        <div class="Reserves__title Reserves">
            店舗管理
        </div>

    </div>
    <div class="Contents layout__center-row">
        <div class="Reserves">
            <a href="{{ route('createShop') }}">
                <div class="Reserve_Card">
                    <div class="layout__center-row">
                        <div class="Card_titile">
                            新規店舗の登録
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection