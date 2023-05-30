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
        <div class="Favorites__title Favorites">
            予約状況
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
            <div class="Cards">
                @foreach ($shops as $shop)
                    <div class="Card Manage">
                        <div class="Card_img">
                            <img src="{{ url('storage/images/',[$shop->id,$shop->picture]) }}">
                        </div>
                        <div class="Card_ShopName">
                            {{$shop->name}}
                        </div>
                        {{-- <div class="Tags">
                            #{{$shop->area->area}} #{{$shop->genre->genre}}
                        </div> --}}
                        <div class="Buttons layout__center">
                            <a href="{{ url('/reserve',[$shop->id]) }}">
                                <button id='button' type="submit" class="detail">
                                    予約の確認
                                </button>
                            </a>
                        </div>
                        <div class="Buttons layout__center">
                                <a href="{{ url('/shopmanage',[$shop->id]) }}">
                                <button id='button' type="submit" class="detail">
                                    店舗情報の編集
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
                </div>
        <div class="Favorites">
            {{-- <div class="Cards">
                @foreach ($favoriteShops as $shop)
                    <div class="Card">
                        <div class="Card_img">
                            <img src="{{ url('storage/images/',[$shop->shop->id,$shop->shop->picture]) }}">
                        </div>
                        <div class="Card_ShopName">
                            {{$shop->shop->name}}
                        </div>
                        <div class="Tags">
                            #{{$shop->shop->area->area}} #{{$shop->shop->genre->genre}}
                        </div>
                        <div class="Buttons layout__center-row">
                            <a href="{{ url('/reserve',[$shop->shop->id]) }}">
                                <button id='button' type="submit" class="detail">
                                    詳しく見る
                                </button>
                            </a>
                            <div>
                                <form action="/favorite" method="post">
                                    @csrf
                                    <input type="hidden" name="shop_id" value="{{$shop->shop->id}}">
                                    <button class="favorite CRed">
                                        &#9829;
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
            </div>
                </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection