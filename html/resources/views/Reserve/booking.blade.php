@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Reserve.css') }}" />
    <script language="javascript" type="text/javascript">
        window.addEventListener('load', function(){
            const searchbar = document.getElementById('searchbar');

            function inputChange(){
            searchbar.submit();
            }
            searchbar.onchange = inputChange;

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
        <form method="POST" action="{{ url('/booking',[$shop->id]) }}" class="layout__center-row" id = "searchbar">
            @csrf
            <div class="area_pulldown">
                <input type="date" name="date" id="Form_date">
            </div>
        </form>
    </div>
</div>
<div class="layout__center">
    <table>
        <tr>
            <th>
                Name
            </th>
            <th>
                Date
            </th>
            <th>
                Time
            </th>
            <th>
                Number
            </th>
            <th>
                Status
            </th>
        </tr>
        @foreach ($reserves as $reserve)
        <tr>
            <td>
                Name
            </td>
            <td>
                Date
            </td>
            <td>
                Time
            </td>
            <td>
                Number
            </td>
            <td>
                Status
            </td>
        </tr>
        @endforeach
    </table>
</div>
@if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
@endsection

