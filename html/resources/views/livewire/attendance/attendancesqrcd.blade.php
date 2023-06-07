@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Home.css') }}" />
    <style>
        #canvas {
            width: 100%;
            height: 720px;
        }
    </style>
    @push('scripts')
    @endpush

@endsection

@section('pagetitle','Rese Checkin')

@section('contents')
<div>
    <div id="loading">ブラウザのカメラの使用を許可してください。</div>
    @if (session()->has('message'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="fa-solid fa-circle-check mr-1"></i>
        {{ session('message') }}
    </div>
    @endif
    <canvas id="canvas" hidden></canvas>
</div>
@endsection

