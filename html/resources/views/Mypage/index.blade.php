@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Mypage.css') }}" />
@endsection

@section('pagetitle','Rese Mypage')

@section('contents')
    <div class="message">
        {{$user->name}}さんのマイページ
    </div>
    <div class="Titles layout__center-row">
        <div class="Reserves__title Reserves">
            予約状況
        </div>
        <div class="Favorites__title Favorites">
            お気に入り店舗
        </div>

    </div>
    <div class="Contents layout__center-row">
        <div class="Reserves">
            <?php $i=1; ?>
            @foreach ($reserves as $reserve)
                <div class="Reserve_Card">
                    <div class="layout__center-row">
                        <div class="Reserve_fix">
                            <form action="{{ url('/reserve',[$reserve->shop->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$reserve->id}}">
                                @if ($reserve->reservationstatuses_id ==1)
                                <button type="submit">
                                    &#x21BB;
                                </button>
                                @else
                                <button type="submit" disabled>
                                    &#x21BB;
                                </button>
                                @endif
                            </form>
                        </div>

                        <div class="Card_titile">
                            @if ($reserve->reservationstatuses_id ==1)
                            予約:
                            @elseif ($reserve->reservationstatuses_id ==3)
                            チェックイン済み:
                            @elseif ($reserve->reservationstatuses_id ==4)
                            決済済み:
                            @else
                            評価済み:
                            @endif
                            <?php echo $i; ?>
                        </div>
                        <div class="Reserve_delete">
                            <form action="/reserve/delete" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$reserve->id}}">
                                @if ($reserve->reservationstatuses_id ==1)
                                <button type="submit">
                                    ×
                                </button>
                                @else
                                <button type="submit" disabled>
                                    ×
                                </button>
                                @endif
                            </form>
                        </div>
                    </div>
                    <div class="Reserve__remind">
                        <table class="Remind">
                            <tr>
                                <td>
                                    Shop
                                </td>
                                <td>
                                    {{$reserve->shop->name}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Date
                                </td>
                                <td id="date">
                                    {{$reserve->date}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Time
                                </td>
                                <td id="time">
                                    {{$reserve->time}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Number
                                </td>
                                <td id="number">
                                    {{$reserve->number_of_people}}
                                </td>
                            </tr>
                        </table>
                        <div class="layout__center">
                            {!! QrCode::generate($reserve->id); !!}
                        </div>
                    </div>
                    <div class="layout__center">
                        @if ($reserve->reservationstatuses_id ==1)
                        <button id='button' type="submit" class="payment" disabled>
                            <a href="{{ url('/purchase',[$reserve->id]) }}">支払</a>
                        </button>
                        @elseif ($reserve->reservationstatuses_id ==3)
                        <button id='button' type="submit" class="payment">
                            <a href="{{ url('/purchase',[$reserve->id]) }}">支払</a>
                        </button>
                        @elseif ($reserve->reservationstatuses_id ==4)
                        <button id='button' type="submit" class="payment">
                            <a href="{{ url('/review',[$reserve->id]) }}">評価する</a>
                        </button>
                        @else
                        <button id='button' type="submit" class="payment" disabled>
                            <a href="{{ url('/review',[$reserve->id]) }}">評価する</a>
                        </button>
                        @endif
                    </div>
                </div>
                <?php $i++; ?>
            @endforeach
        </div>
        <div class="Favorites">
            <div class="Cards">
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
                @endforeach
            </div>
                </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection