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

            function dateChange(){
                R_date.innerHTML = Form_date.value;
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

@section('pagetitle','Rese Shop Manage')

@section('contents')
    <div class="Contents layout__center-row">
        <div class="Shop__detail">
            <div class="Link_And_Name layout__center-row">
                <a href="{{ route('mypage') }}">
                    <div class="Shop__detail_link">
                            <
                    </div>
                </a>
                <div class="Shop__detail_shopname">
                    
                </div>
            </div>
            <div class="Shop__detail__img">
            </div>
            <div class="Shop__detail_tags">
            </div>
            <div class="about">
            </div>
        </div>
        <div class="Reserve Card">
            <div class="Reserve__titie">
                新規店舗の作成
            </div>
            <form action="/shopmanage" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                    <div class="Reserve__remind">
                        <table>
                            <tr>
                                <td>
                                    ShopName
                                </td>
                                <td>
                                    <input type="text" name="name">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Area
                                </td>
                                <td>
                                    <select name="area_id" id="area">
                                        <option value="">All Area</option>
                                        @foreach ($areas as $area)
                                            <option value="{{$area->id}}">
                                                {{$area->area}}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Genre
                                </td>
                                <td>
                                    <div class="genre_pulldown">
                                        <select name="genre_id" id="genre">
                                            <option value="">All Genre</option>
                                            @foreach ($genres as $genre)
                                                <option value="{{$genre->id}}">
                                                    {{$genre->genre}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    About
                                </td>
                                <td>
                                    <textarea name="about" cols="30" rows="6" placeholder="About......"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Picture
                                </td>
                                <td>
                                    <input type="file" name="picture" accept="image/png, image/jpeg">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <button id='button' type="submit">
                        <div class="reserve__button">
                            店舗情報を作成する
                        </div>
                    </button>
            </form>
        </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection

