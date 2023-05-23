@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Home.css') }}" />
@endsection

@section('pagetitle','Rese')

@section('contents')
    <div class="messageAndSearchbar layout__center-row">
        <div class="message">
            {{$message}}
        </div>
        <div class="searchbar">
            <form method="post" class="layout__center-row" >
                <div class="area_pulldown">
                    <select name="area" id="">
                        <option value="" selected>All Area</option>
                        @foreach ($areas as $area)
                            <option value="{{$area->id}}">
                                {{$area->area}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="genre_pulldown">
                    <select name="genre" id="">
                        <option value="" selected>All Genre</option>
                        @foreach ($genres as $genre)
                            <option value="{{$genre->id}}">
                                {{$genre->genre}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="search_text">
                    <input type="text" name="search" id="search" placeholder="Search......">
                </div>
            </form>
        </div>
    </div>
    <div class="Cards">
        <div class="Card">
            <div class="Card_img">
                <img src="{{ asset('storage/images/1/sushi.jpg') }}">
            </div>
            <div class="Card_ShopName">
                仙人
            </div>
            <div class="Tags">
                東京都寿司
            </div>
            <div class="Buttons layout__center-row">
                <button id='button' type="submit">
                    詳しく見る
                </button>
                <div class="favorite">
                    &#9829;
                </div>
            </div>
        </div>
    
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection

