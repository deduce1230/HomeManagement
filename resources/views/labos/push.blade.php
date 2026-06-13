@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@section('pageCss')
  <link href="/css/hm_style_line.css" rel="stylesheet" type="text/css">
@endsection
@include('section.head')
<script type="text/javascript" src="/js/hm_rec_script.js"></script>
<script src='/webpush.js'></script>
@include('section.header')

@section('content')
  <h5>WebPushテスト</h5>

    <form class="meal-input-form" method="post" action="/cooking/update_detail" autocomplete="off">
      @csrf
      <meta name="csrf-token" content="{{ csrf_token() }}" /> <!-- これがないとpost時に419エラーになる -->


      <div class="line__container">

        <a href="javascript:registPush()">WebPushを許可する</a>
        <br>
        <a href="javascript:msgPush(1)">WebPushテスト(直志)</a>
        <br>
        <a href="javascript:msgPush(2)">WebPushテスト(裕子)</a>
      </div>
    </form>

<script>
  function registPush(){
  // Webpush通知のON/OFF結果をもとに、エンドポイント登録用APIで情報を送る
     allowWebPush().then(value => {

//       alert(String(value[0]));
//       alert(String(value[1]));
//       alert(String(value[2]));

       return $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },//これがないと419エラーになる
           url: "/communication/push/regist",
            type: "post",
            dataType: "json",
            data: {
              endpoint: String(value[0]),
              publickey: String(value[1]),
              token: String(value[2]),
            },
       })
       .done(function(result) {
          alert('SUCCESS');

       }).fail(function(result) {
          console.log('ERROR');
       });
     });

  };

  function msgPush(_user_id){
       return $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },//これがないと419エラーになる
           url: "/communication/push/alert/"+ String(_user_id) + "/HELLO",
            type: "get",
       })
       .done(function(result) {
          alert('SUCCESS');

       }).fail(function(result) {
          alert('ERROR');
       });

  }
</script>



@endsection
@include('section.footer')

