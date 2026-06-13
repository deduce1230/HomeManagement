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
        <h5>トーキングルーム</h5>

  <div class="line__container">
    <!-- タイトル -->
<!--
    <div class="line__title">
      トーキングルーム
    </div>
-->
    <!-- ▼会話エリア scrollを外すと高さ固定解除 -->
    <div class="line__contents scroll">

      <!-- 相手の吹き出し -->
      <div class="line__left">
        <figure>
          <img src="/images/stamps/1.png" />
        </figure>
        <div class="line__left-text">
          <div class="name">ゆうこ</div>
          <div class="text">飲みすぎちゃってますー</div>
        </div>
      </div>

      <!-- 相手のスタンプ -->
      <div class="line__left">
        <div class="stamp"><img src="/images/stamps/13.png" /></div>
      </div>

      <!-- 相手の吹き出し -->
      <div class="line__left">
        <figure>
          <img src="/images/stamps/10.png" />
        </figure>
        <div class="line__left-text">
          <div class="name">ゆうこ</div>
          <div class="text">今から帰るよー</div>
        </div>
      </div>

      <!-- 自分の吹き出し -->
      <div class="line__right">
        <div class="name">なおし</div>
        <div class="text">了解！寝過ごさないようにだよ?風呂ためとこ</div>
        <span class="date">0:30</span>
      </div>

      <!-- 自分のスタンプ -->
      <div class="line__right">
        <div class="stamp"><img src="/images/stamps/22.png" /></div>
        <span class="date"0:30</span>
      </div>

    </div>
    <!--　▲会話エリア ここまで -->
  </div>
@endsection
@include('section.footer')

