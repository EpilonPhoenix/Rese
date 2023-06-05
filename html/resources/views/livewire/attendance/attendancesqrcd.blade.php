@extends('Layouts.app')

@section('Css')
    <link rel="stylesheet" href="{{ asset('assets/css/Home.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
    <script language="javascript" type="text/javascript">
        window.addEventListener('load', function(){
            const video = document.createElement('video');
            const canvasElement = document.getElementById('canvas');
            const canvas = canvasElement.getContext('2d');
            const loading = document.getElementById('loading');
            const output = document.getElementById('output');
            let previousData = '';

            navigator.mediaDevices.getUserMedia({
                    video: {
                        facingMode: 'environment',
                    }
                })
                .then((stream) => {
                    video.srcObject = stream;
                    video.setAttribute('playsinline', true);
                    video.play();
                    requestAnimationFrame(tick);
                });
                function tick() {
                loading.innerText = 'ロード中...';
                if (video.readyState === video.HAVE_ENOUGH_DATA) {
                    loading.hidden = true;
                    canvasElement.hidden = false;
                    canvasElement.height = video.videoHeight;
                    canvasElement.width = video.videoWidth;
                    canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
                    var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
                    var code = jsQR(imageData.data, imageData.width, imageData.height, {
                        inversionAttempts: 'dontInvert',
                    });
                    // 直前に読み込んだQRコードの会員ならスキップさせる。そうしないと同じQRコードを常にリクエストしちゃう
                }
                requestAnimationFrame(tick);
            }
        })
    </script>
@endsection

@section('pagetitle','Rese')

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

    <style>
        #canvas {
            width: 100%;
            height: 720px;
        }
    </style>
    {{-- @pushで囲んだ内容を@stackで出力する --}}
    @push('scripts')
    @endpush

</div>
@endsection
