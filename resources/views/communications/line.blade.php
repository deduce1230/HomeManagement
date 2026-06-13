@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@section('pageCss')
  <link href="/css/hm_style_line.css" rel="stylesheet" type="text/css">
@endsection
@include('section.head')
<script type="text/javascript" src="/js/hm_rec_script.js"></script>
@include('section.header')

@section('content')

  <meta name="csrf-token" content="{{ csrf_token() }}" /> <!-- これがないとpost時に419エラーになる -->

  <!-- LINE風ここから -->
  <div class="line__container">
    <!-- タイトル -->
    <div class="line__title">
      2021/10/31 (金)
    </div>

    <!-- 会話エリア scrollを外すと高さ固定解除 -->
    <div id="line_conteiner" class="line__contents">

<!--      <!-- 相手の吹き出し -->
<!--      <div class="line__left">
<!--        <figure>
<!--          <img src="/images/stamps/icon.png" />
<!--        </figure>
<!--        <div class="line__left-text">
<!--          <div class="name">うさきち</div>
<!--          <div class="text">ねぇねぇ、帰ってくるのおそいんだけど！！今どこいまどこいまどこーー</div>
<!--        </div>
<!--      </div>
<!--
<!--      <!-- 相手のスタンプ -->
<!--      <div class="line__left">
<!--        <div class="stamp"><img src="/images/stamps/13.png" /></div>
<!--      </div>
<!--
<!--      <!-- 相手の吹き出し -->
<!--      <div class="line__left">
<!--        <figure>
<!--          <img src="/images/stamps/icon.png" />
<!--        </figure>
<!--        <div class="line__left-text">
<!--          <div class="name">うさきち</div>
<!--          <div class="text">今から帰るよー</div>
<!--        </div>
<!--      </div>
<!--
<!--      <!-- 自分の吹き出し -->
<!--      <div class="line__right">
<!--        <div class="text">了解！寝過ごさないようにだよ?風呂ためとこ</div>
<!--        <span class="date">既読<br>0:30</span>
<!--      </div>
<!--
<!--      <!-- 自分のスタンプ -->
<!--      <div class="line__right">
<!--        <div class="stamp"><img src="/images/stamps/22.png" /></div>
<!--        <span class="date">既読<br>0:30</span>
<!--      </div>
-->

      <div class="line__right">
        <div class="text">了解！寝過ごさないようにだよ?風呂ためとこ</div>
        <span class="date">既読<br>0:30</span>
      </div>

    </div>
    <!--会話エリア ここまで -->

    <div class="line_input">
      <table class="table table-hover hm-table01">
      <tr>
        <td class="td-center td-no-rightleft" width='30px'>
           <div>
              <label class="btn-real btn-real3" style="margin-left:0px; margin-bottom:10px" id="camera_btn">
                 <i class="fas fa-stamp fa-lg"></i>
              </label>
           </div>
           <div>
              <label class="btn-real btn-real3" style="margin-left:0px; margin-bottom:10px" id="camera_btn">
                 <i class="fas fa-file-image fa-lg"></i>
              </label>
          </div>
        </td>
        <td class="td-center td-no-rightleft">

          <textarea id="line_message" name="message" class="form-control textarea-wide" rows="4" placeholder="メッセージ記載"></textarea>
        </td>
        <td class="td-center td-no-rightleft" width='30px'>
           <div>
              <label class="btn-real btn-real3" style="margin-left:0px; margin-bottom:10px" id="send_btn">
                 <i class="fas fa-paper-plane fa-lg"></i>
              </label>
          </div>
        </td>
      </tr>
      </table>
    </div>  

  </div>
  <!--LINE風ここまで -->

<script>
  var sendBtn = document.getElementById('send_btn');
  var lineMessage = document.getElementById('line_message');

  sendBtn.addEventListener('click', function() {
      msgPost();
  });

  function msgPost(){

      //今日の日付データを変数todayに格納
      var today=new Date(); 

      //年・月・日を取得する
      var year  = today.getFullYear();
      var month = today.getMonth()+1;
      var day   = today.getDate();

      //時刻データを取得して変数jikanに格納する
      var jikan= new Date();

      //時・分・秒を取得する
      var hour = jikan.getHours();
      var minute = jikan.getMinutes();
      var second = jikan.getSeconds();

       return $.ajax({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },//これがないと419エラーになる
           url: "/communication/line/post",
            type: "post",
            dataType: "json",
            data: {
              line_date: String(year)+'/'+String(month)+'/'+String(day),
              line_time: String(hour)+':'+String(minute)+':'+String(second),
              line_text: lineMessage.value,
              user_id_to: 2,
            },
       })
       .done(function(result) {
          var newElement1 = document.createElement("div");
          newElement1.setAttribute("class","line__right");
          var newElement2 = document.createElement("div");
          newElement2.setAttribute("class","text");
          var newElement3 = document.createElement("span");
          newElement3.setAttribute("class","date");
         
          var newContent2 = document.createTextNode("こんにちは");
          //var newContent3 = document.createTextNode("既読<br>0:30");

          newElement2.appendChild(newContent2);
          //newElement3.appendChild(newContent3);
          newElement3.innerHTML="既読<br>0:30";

          newElement1.appendChild(newElement2);
          newElement1.appendChild(newElement3);

          // 親要素（div）への参照を取得
          var parentDiv = document.getElementById("line_conteiner");
          parentDiv.insertBefore(newElement1, null);
 

       }).fail(function(result) {
          alert('ERROR');
       });

  }
</script>


@endsection
@include('section.footer')

