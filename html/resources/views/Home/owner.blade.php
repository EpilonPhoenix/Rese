@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Home.css') }}" />
    <script language="javascript" type="text/javascript">
        window.addEventListener('load', function(){
            const searchbar = document.getElementById('searchbar');
            const area = document.getElementById('area');
            const ganre = document.getElementById('genre');
    
            function inputChange(){
                searchbar.submit();
            }
            searchbar.onchange = inputChange;
    
        })
        </script>
    
@endsection

@section('pagetitle','Rese')

@section('contents')
    <div class="messageAndSearchbar layout__center-row">

        <div class="message">
            {{$user->name}}様の管理画面
        </div>
        <div class="searchbar">
            <form method="POST" action="/" class="layout__center-row" id = "searchbar">
                @csrf
                <div class="area_pulldown">
                    <select name="area" id="area">
                        <option value="">All Area</option>
                        @foreach ($areas as $area)
                            <option value="{{$area->id}}" @if ($area->id == (int)$valarr['area'])  selected @endif>
                                {{$area->area}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="genre_pulldown">
                    <select name="genre" id="genre">
                        <option value="">All Genre</option>
                        @foreach ($genres as $genre)
                            <option value="{{$genre->id}}" @if ($genre->id == (int)$valarr['genre'])  selected @endif>
                                {{$genre->genre}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="search_text">
                    <input type="text" name="search" id="search" placeholder="Search......" value={{$valarr['text']}}>
                </div>
            </form>
        </div>
    </div>
    <div class="Cards">
        @foreach ($shops as $shop)
            <div class="Card">
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

@if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection

