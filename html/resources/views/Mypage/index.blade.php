@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Mypage.css') }}" />
@endsection

@section('pagetitle','Rese Mypage')

@section('contents')
    <div class="message">
        {{$user->name}}さんのマイページ
    </div>
    <div class="Contents layout__center-row">
        <div class="Reserves">
            <div class="Reserves__title">
                予約状況
            </div>
            <?php $i=1; ?>
            @foreach ($reserves as $reserve)
                <div class="Reserve_Card">
                    <div class="Card_titile layout__center-row">
                        予約:
                        <?php echo $i; ?>
                    </div>
                    <div class="Reserve__remind">
                        <table>
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
                    </div>
                </div>
                <?php $i++; ?>
            @endforeach
        </div>
        <div class="Favorites">
            <div class="Favorites__title">
                お気に入り店舗
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection