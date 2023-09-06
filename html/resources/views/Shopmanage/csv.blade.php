@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Reserve.css') }}" />
@endsection

@section('pagetitle','Rese Shop Manage')

@section('contents')
    <div class="Contents layout__center-row">
        <div class="Reserve Card">
            <div class="layout__center-row">
                <div class="Reserve__titie">
                    CSVのインポート
                </div>
            </div>
            <form action="/csvimport" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                    <div class="Reserve__remind">
                        <table>
                            <tr>
                                <td>
                                    CSV
                                </td>
                                <td>
                                    <input type="file" name="csvFile" accept="text/csv">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <button id='button' type="submit">
                        <div class="reserve__button">
                            csvファイルをアップロードする
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

