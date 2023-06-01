@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Reserve.css') }}" />
    <script language="javascript" type="text/javascript">
        window.addEventListener('load', function(){
            const Form_date = document.getElementById('Form_date');
            const Form_time = document.getElementById('Form_time');
            const Form_Nop = document.getElementById('Form_Nop');
            const R_date = document.getElementById('date');
            const time = document.getElementById('time');
            const number = document.getElementById('number');
            let d = new Date();

            function dateChange(){
                R_date.innerHTML = Form_date.value;
            }
            function timeChange(){
                time.innerHTML = Form_time.value;
            }
            function numberChange(){
                number.innerHTML = Form_Nop.value;
            }

            // 年を取得
            let year = d.getFullYear();
            // 月を取得
            let month = d.getMonth() + 1;
            // 日を取得
            let date = d.getDate()+1;
            // 1桁の場合は0を足して2桁に
            month = month < 10 ? "0" + month : month;
            date = date < 10 ? "0" + date : date;
            let days = `${year}-${month}-${date}`;

            Form_date.onchange = dateChange;
            Form_time.onchange = timeChange;
            Form_Nop.onchange = numberChange;
            Form_date.min = days;

        })
        </script>
    
@endsection

@section('pagetitle','Rese Reserve')

@section('contents')
    <div class="Contents layout__center-row">
        <div class="Shop__detail">
            <div class="Link_And_Name layout__center-row">
                <a href="{{ route('home') }}">
                    <div class="Shop__detail_link">
                            <
                    </div>
                </a>
                <div class="Shop__detail_shopname">
                    {{$shop->name}}
                </div>
            </div>
            <div class="Shop__detail__img">
                <img src="{{ url('storage/images/',[$shop->id,$shop->picture]) }}">
            </div>
            <div class="Shop__detail_tags">
                #{{$shop->area->area}} #{{$shop->genre->genre}}
            </div>
            <div class="about">
                {{$shop->about}}
            </div>
        </div>
        <div class="Reserve Card">
            <div class="Reserve__titie">
                予約
            </div>
            <form action="/reserve" method="post">
                @csrf
                    @if ($reserve != Null)
                    <input type="hidden" name="id" value="{{$reserve->id}}">
                    <input type="hidden" name="reservationtatuses_id" value=1>
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <div class="Reserve__date">
                        <input type="date" name="date" id="Form_date" value ="{{$reserve->date}}">
                    </div>
                    <div class="Reserve__time">
                        <input type="time" name="time" id="Form_time" value ="{{$reserve->time}}">
                    </div>
                    <div class="Reserve__NoP">
                        <input type="number" name="number_of_people" id="Form_Nop" min="1" max="9" value ="{{$reserve->number_of_people}}">
                    </div>
                    <div class="Reserve__remind" margin-bottom="220">
                        <table>
                            <tr>
                                <td>
                                    Shop
                                </td>
                                <td>
                                    {{$shop->name}}
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
                    @if (Auth::check())
                    <button id='button' type="submit">
                        <div class="reserve__button">
                            予約を変更する
                        </div>
                    </button>
                    @else
                    <button id='button' type="submit" disabled>
                        <div class="reserve__button">
                            ログインして下さい
                        </div>
                    </button>
                    @endif
                    @else
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <input type="hidden" name="reservationtatuses_id" value=1>
                    <div class="Reserve__date">
                        <input type="date" name="date" id="Form_date">
                    </div>
                    <div class="Reserve__time">
                        <input type="time" name="time" id="Form_time">
                    </div>
                    <div class="Reserve__NoP">
                        <input type="number" name="number_of_people" id="Form_Nop" min="1" max="9">
                    </div>
                    <div class="Reserve__remind">
                        <table>
                            <tr>
                                <td>
                                    Shop
                                </td>
                                <td>
                                    {{$shop->name}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Date
                                </td>
                                <td id="date">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Time
                                </td>
                                <td id="time">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Number
                                </td>
                                <td id="number">
                                </td>
                            </tr>
                        </table>
                    </div>
                    @if (Auth::check())
                    <button id='button' type="submit">
                        <div class="reserve__button">
                            予約する
                        </div>
                    </button>
                    @else
                    <button id='button' type="submit" disabled>
                        <div class="reserve__button">
                            ログインして下さい
                        </div>
                    </button>
                    @endif
                @endif
            </form>
        </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection

