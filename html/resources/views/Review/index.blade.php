@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Review.css') }}" />
    <script language="javascript" type="text/javascript">
        window.addEventListener('load', function(){
            const stars = document.getElementsByClassName("star");
            const rate = document.getElementById('evaluate');
            const dropZone = document.getElementById('drop-zone');
            const fileInput = document.getElementById('file-input');

            var clicked = false;
            var onload= true;
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
                    i+1;
                    rate.value = (i+1).toString();
                    }
                    for (let j = i + 1; j < stars.length; j++) {
                    stars[j].style.color = "#a09a9a";

                    }
                },
                false
                );
                if (onload){
                    let i={{$review->evaluate}}-1;
                    for (let j = 0; j <= i; j++) {
                    stars[j].style.color = "#f0da61";
                    i+1;
                    rate.value = (i+1).toString();
                    console.log(j);
                    }
                    for (let j = i + 1; j < stars.length; j++) {
                    stars[j].style.color = "#a09a9a";
                    onload=false;
                }
            }

            }
            dropZone.addEventListener('dragover', function(e) {
                e.stopPropagation();
                e.preventDefault();
                this.style.background = '#e1e7f0';
            }, false);

            dropZone.addEventListener('dragleave', function(e) {
                e.stopPropagation();
                e.preventDefault();
                this.style.background = '#ffffff';
            }, false);
            dropZone.addEventListener('drop', function(e) {
                e.stopPropagation();
                e.preventDefault();
                this.style.background = '#ffffff'; //背景色を白に戻す
                var files = e.dataTransfer.files; //ドロップしたファイルを取得
                if (files.length > 1) return alert('アップロードできるファイルは1つだけです。');
                fileInput.files = files; //inputのvalueをドラッグしたファイルに置き換える。
            }, false);
            });
    </script>
@endsection

@section('pagetitle','Rese Review')

@section('contents')
<div class="message">
    口コミを投稿して下さると幸いです。
</div>
<div class="Card">
    <div class="Card_img">
        <img src="{{ url('storage/images',[$shop->id,$shop->picture]) }}">
    </div>
    <div class="Card_ShopName">
        {{$shop->name}}
    </div>
    <div class="Tags">
        #{{$shop->area->area}} #{{$shop->genre->genre}}
    </div>
    <div class="Buttons layout__center-row">
        <a href="{{ url('/reserve',[$shop->id]) }}">
            <button id='button' type="submit" class="detail">
                詳しく見る
            </button>
        </a>
        <div>
            @if (Auth::check())
            <form action="/favorite" method="post">
                @csrf
                <input type="hidden" name="shop_id" value="{{$shop->id}}">
                @if ($shop->favorite !=Null)
                <button class="favorite CRed">
                    &#9829;
                </button>
                @else
                <button class="favorite">
                    &#9829;
                </button>
                @endif
            </form>
            @else
            <button class="favorite" disabled>
                &#9829;
            </button>
        @endif
        </div>
    </div>
</div>
<div class="Review layout__center">
    <h1>
        体験を評価して下さい
    </h1>
    <form class="layout__center" action="/review" method="post"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="shop_id" value="{{$shop->id}}">
            <div class='Rating'>
                <span class="star" id="1">★</span>
                <span class="star" id="2">★</span>
                <span class="star" id="3">★</span>
                <span class="star" id="4">★</span>
                <span class="star" id="5">★</span>
                <input type="hidden" name="evaluate" id="evaluate" value="{$review->evaluate}}">
            </div>
        <h1>
            口コミを投稿
        </h1>
        <div class="layout__center">
            <textarea type="text" name="comments" class="Review__comments" placeholder="Comments...">{{$review->comments}}</textarea>
        </div>
        <h1>
            画像の追加
        </h1>
        <div id="drop-zone" class="layout__center dropzone">
            <p>ファイルをドラッグ＆ドロップもしくは</p>
            <input type="file" name="picture" id="file-input" accept="image/png, image/jpeg">
        </div>

        <div class="Submit layout__center">
            <button>
                口コミを投稿
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