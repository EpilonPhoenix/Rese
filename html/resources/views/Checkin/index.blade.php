@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Home.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>

@endsection

@section('pagetitle','Rese Checkin')

@section('contents')
<livewire:checkin>

@endsection