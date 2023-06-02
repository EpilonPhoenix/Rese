@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Mypage.css') }}" />
@endsection

@section('pagetitle','Rese Mypage')

@section('contents')
    <div class="message">
        管理者のマイページ
    </div>
    <div class="Titles layout__center-row">
        <div class="Reserves__title Reserves">
            ユーザーマネジメント
        </div>

    </div>
    <div class="UserList layout__center">
        <table>
            <thead>
                <th>
                    店舗オーナー
                </th>
            </thead>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    E-mail
                </th>
                <th>
                    Change Role
                </th>
                <th>
                    Delete
                </th>
            </tr>
            @foreach ($owners as $owner)
            <tr>
                <td>
                    {{$owner->name}}
                </td>
                <td>
                    {{$owner->email}}
                </td>
                <td>
                    <form action="/user/roledown" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$owner->id}}">
                        <button type="submit">
                            ユーザーに変更
                        </button>
                    </form>
                </td>
                <td>
                    <form action="/user/delete" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$owner->id}}">
                        <button type="submit">
                            削除
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="UserList layout__center">
        <table>
            <thead>
                <th>
                    ユーザー
                </th>
            </thead>
            <tr>
                <th>
                    Name
                </th>
                <th>
                    E-mail
                </th>
                <th>
                    Change Role
                </th>
                <th>
                    Delete
                </th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    <form action="/user/roleup" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button type="submit">
                            店舗オーナーに変更
                        </button>
                    </form>
                </td>
                <td>
                    <form action="/user/delete" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button type="submit">
                            削除
                        </button>
                    </form>
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