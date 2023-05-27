@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Reserve.css') }}" />
    <script language="javascript" type="text/javascript">
        window.addEventListener('load', function(){
            const Form_date = document.getElementById('Form_date');
            const Form_time = document.getElementById('Form_time');
            const Form_Nop = document.getElementById('Form_Nop');
            const date = document.getElementById('date');
            const time = document.getElementById('time');
            const number = document.getElementById('number');
    
            function dateChange(){
                date.innerHTML = Form_date.value;
            }
            function timeChange(){
                time.innerHTML = Form_time.value;
            }
            function numberChange(){
                number.innerHTML = Form_Nop.value;
            }

            Form_date.onchange = dateChange;
            Form_time.onchange = timeChange;
            Form_Nop.onchange = numberChange;
    
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
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                <div class="Reserve__date">
                    <input type="date" name="date" id="Form_date">
                </div>
                <div class="Reserve__time">
                    <input type="time" name="time" id="Form_time">
                </div>
                <div class="Reserve__NoP">
                    <input type="number" name="number_of_people" id="Form_Nop">
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
            </form>
        </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection

