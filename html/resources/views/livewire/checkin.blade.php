<div class="layout__center">
    <div id="output" hidden>
        <div id="outputMessage">No QR code detected.</div>
        <div hidden><b>Data:</b> <span id="outputData"></span></div>
      </div>
    <div id="loading">ブラウザのカメラの使用を許可してください。</div>
    @if (session()->has('message'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="fa-solid fa-circle-check mr-1"></i>
        {{ session('message') }}
    </div>
    @endif

    <canvas id="canvas" hidden></canvas>
</div>


@push('scripts')
<script language="javascript" type="text/javascript">
window.addEventListener('load', function(){
        const video = document.createElement('video');
        const canvasElement = document.getElementById('canvas');
        const canvas = canvasElement.getContext('2d');
        const loading = document.getElementById('loading');
        const output = document.getElementById('output');
        let previousData = '';
        const outputContainer = document.getElementById("output");
        const outputMessage = document.getElementById("outputMessage");
        const outputData = document.getElementById("outputData");

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
            if (code) {
                drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
                drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
                drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
                drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
                outputMessage.hidden = true;
                outputData.parentElement.hidden = false;
                outputData.innerText = code.data;
            } else {
                outputMessage.hidden = false;
                outputData.parentElement.hidden = true;
            }
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
                if (code && code.data !== previousData) {
                    previousData = code.data;
                    console.log(code.data);
                    @this.attend(code.data) // livewireのメソッドを実行する。
                }
            }
            requestAnimationFrame(tick);
    }
})

</script>
@endpush