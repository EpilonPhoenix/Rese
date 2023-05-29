@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Review.css') }}" />
    <script language="javascript" type="text/javascript">
        window.addEventListener('load', function(){
            const stars = document.getElementsByClassName("star");
            const rate = document.getElementById('evaluate');
            var clicked = false;
            for (let i = 0; i < stars.length; i++) {
                stars[i].addEventListener(
                "mouseover",
                () => {
                    if (!clicked) {
                    for (let j = 0; j <= i; j++) {
                        stars[j].style.color = "#f0da61";
                    }
                    }
                },
                false
                );

                stars[i].addEventListener(
                "mouseout",
                () => {
                    if (!clicked) {
                    for (let j = 0; j < stars.length; j++) {
                        stars[j].style.color = "#a09a9a";
                    }
                    }
                },
                false
                );

                stars[i].addEventListener(
                "click",
                () => {
                    clicked = true;
                    for (let j = 0; j <= i; j++) {
                    stars[j].style.color = "#f0da61";
                    rate.value = i+1;
                    }
                    for (let j = i + 1; j < stars.length; j++) {
                    stars[j].style.color = "#a09a9a";
                    }
                },
                false
                );
            }
            });
    </script>
@endsection

@section('pagetitle','Rese Review')

@section('contents')
    <div class="message">
        ご来店ありがとうございます。レビューを投稿して下さると幸いです。
    </div>
    <div class="Reserve_Card">
        <div class="layout__center-row">
            <div class="Card_titile">
                来店済み予約:
            </div>
        </div>
        <div class="Reserve__remind">
            <table>
                <tr>
                    <td>
                        Shop
                    </td>
                    <td>
                        {{-- {{$reserve->shop->name}} --}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Date
                    </td>
                    <td id="date">
                        {{-- {{$reserve->date}} --}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Time
                    </td>
                    <td id="time">
                        {{-- {{$reserve->time}} --}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Number
                    </td>
                    <td id="number">
                        {{-- {{$reserve->number_of_people}} --}}
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <div class="Review layout__center">
        <form class="layout__center" action="" method="post">
            <div class='Rating'>
            <span class="star" id="1">★</span>
            <span class="star" id="2">★</span>
            <span class="star" id="3">★</span>
            <span class="star" id="4">★</span>
            <span class="star" id="5">★</span>
            <input type="hidden" id="evaluate" value="0">
            </div>
            <div class="layout__center">
            <input type="text" name="comments" class="Review__comments" placeholder="Comments...">
            </div>
            <div class="Submit layout__center">
                <button>
                    送信
                </button>
            </div>
            </form>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection