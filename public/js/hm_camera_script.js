//画像アップロード
var dropZone = document.getElementById('drop-zone');
var canvas = document.getElementById('canvas');//処理用キャンバス
var canvas_show = document.getElementById('canvas_show');//画面表示用キャンバス
var fileInput = document.getElementById('file_photo');

var cameraBtn = document.getElementById('camera_btn');
var videoArea = document.getElementById('myVideo');
var localStream = null;


cameraBtn.addEventListener('click', function() {
    if (videoArea.style.display == "block"){
        take_picture();
        StopGetUserMedia();
        videoArea.style.display ="none";
        canvas_show.style.display ="block";
    }else{
        clearphoto();
        videoArea.style.display ="block";
        canvas_show.style.display ="none";
        StartGetUserMedia();
    }
});

fileInput.addEventListener('change', function () {
    previewFile(this.files[0]);
});

dropZone.addEventListener('dragover', function(e) {
    e.stopPropagation();
    e.preventDefault();
    this.style.background = '#e1e7f0';
}, false);

dropZone.addEventListener('dragleave', function(e) {
    e.stopPropagation();
    e.preventDefault();
    this.style.background = '#ffffff';
}, false);

dropZone.addEventListener('drop', function(e) {
    e.stopPropagation();
    e.preventDefault();
    this.style.background = '#ffffff'; //背景色を白に戻す
    var files = e.dataTransfer.files; //ドロップしたファイルを取得
    if (files.length > 1) return alert('アップロードできるファイルは1つだけです。');
    fileInput.files = files; //inputのvalueをドラッグしたファイルに置き換える。
    previewFile(files[0]);
}, false);

function previewFile(file) {
    StopGetUserMedia();
    videoArea.style.display ="none";
    canvas_show.style.display ="block";

    /* FileReaderで読み込み、プレビュー画像を表示。 */
    var fr = new FileReader();
    fr.readAsDataURL(file);
    fr.onload = function() {

        // CANVAS用の処理
        var ctx = canvas.getContext('2d');

        clearphoto() ;

        var img = new Image();
        img.onload = function() {
            // オリジナルサイズで canvas に描画
            canvas.width = img.naturalWidth;
            canvas.height = img.naturalHeight;
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight);

            show_on_canvas();
        };
        img.src = fr.result;
    };
}

//--カメラ表示
function StartGetUserMedia() {
    navigator.mediaDevices.getUserMedia({ video: true, video: { facingMode: "environment" }, audio: false })
    .then(stream => videoArea.srcObject = stream)
    .catch(err => alert(`${err.name} ${err.message}`));
}
function StopGetUserMedia() {
    if (videoArea.srcObject){
        videoArea.srcObject.getVideoTracks().forEach( (camera) => {
            camera.stop();
        });
    }
}


/**
 * canvasの写真領域を初期化する
 */
function clearphoto() {
    let context = canvas.getContext('2d')
    context.fillStyle = "#AAA"
    context.fillRect(0, 0, canvas.width, canvas.height)
}

/**
 * カメラに表示されている現在の状況を撮影する
 */
function take_picture() {
    const ctx = canvas.getContext('2d');
    const video = document.getElementById('myVideo');

    // video サイズが取得できるまで待つ
    if (video.videoWidth === 0 || video.videoHeight === 0) {
        alert("カメラの初期化中です。もう一度お試しください。");
        return;
    }

    // 処理用 canvas はオリジナルサイズ
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.drawImage(video, 0, 0);

    show_on_canvas();
}


function show_on_canvas() {
    let context_show = canvas_show.getContext('2d');

    const maxSize = 300; // 表示用の最大辺（px）

    let srcWidth = canvas.width;
    let srcHeight = canvas.height;

    let scale = Math.min(maxSize / srcWidth, maxSize / srcHeight, 1); // 拡大しない
    let dstWidth = srcWidth* scale;
    let dstHeight = srcHeight * scale;

    // 内部解像度と表示サイズを一致させる
    canvas_show.width = dstWidth;
    canvas_show.height = dstHeight;
    canvas_show.style.width = dstWidth + "px";
    canvas_show.style.height = dstHeight + "px";

    context_show.clearRect(0, 0, dstWidth, dstHeight);
    context_show.drawImage(canvas, 0, 0, dstWidth, dstHeight);
}

var btn = document.getElementById('submit_btn');
btn.addEventListener('click', function() {
    //var canvas = document.getElementById('canvas');
    var canvas = document.getElementById('canvas_show');

    // JPEGで90%品質に圧縮
    var base64 = canvas.toDataURL('image/jpeg', 0.9);

    var imagedata = document.getElementById('imagedata');
    imagedata.value = base64;

    let originalFile = null;

});
document.getElementById('file_photo').addEventListener('change', function(e) {
    originalFile = e.target.files[0];
});

const saveOriginalCheckbox = document.getElementById('originalsize');
//const fileInput = document.getElementById('file_photo');
// 初期状態：オフなら無効化
//fileInput.disabled = !saveOriginalCheckbox.checked;

saveOriginalCheckbox.addEventListener('change', function() {
    if (this.checked) {
        fileInput.disabled = false;
    } else {
        fileInput.value = '';        // 既存ファイルもクリア
        fileInput.disabled = true;   // 送信されないようにする
    }
});

function debug(msg) {
    let div = document.getElementById('debug');
    if (!div) {
        div = document.createElement('div');
        div.id = 'debug';
        div.style.position = 'fixed';
        div.style.bottom = '0';
        div.style.left = '0';
        div.style.width = '100%';
        div.style.maxHeight = '40%';
        div.style.overflow = 'auto';
        div.style.background = 'rgba(0,0,0,0.8)';
        div.style.color = '#0f0';
        div.style.fontSize = '12px';
        div.style.zIndex = 9999;
        document.body.appendChild(div);
    }
    div.innerHTML += `<div>${msg}</div>`;
}