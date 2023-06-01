@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Reserve.css') }}" />
    <script language="javascript" type="text/javascript">
        window.addEventListener('load', function(){
        })
        </script>
    
@endsection

@section('pagetitle','Rese Reserve')

@section('contents')
<div class="messageAndSearchbar layout__center-row">

    <div class="message">
        {{$shop->name}}の予約リスト
    </div>
    <div class="searchbar">
        <form method="POST" action="/" class="layout__center-row" id = "searchbar">
            @csrf
            <div class="area_pulldown">
                <input type="date" name="date" id="Form_date">
            </div>
        </form>
    </div>
</div>
@if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection

