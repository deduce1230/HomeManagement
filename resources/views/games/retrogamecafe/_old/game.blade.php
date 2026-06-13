@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.gamehead2')

@include('section.header')

@section('content')
    <div class="webgl-content" >
       <br>
      <h2><font size=2>スマホやタブレットの場合は横向きにしてください</font></h2>
      <h2>
      <button onclick="gameInstance.SetFullscreen(1)" > 画面最大表示 </button>
      </h2>
      <div id="gameContainer" style="width: 960px; height: 600px">
      </div>
      <div class="footer">
        <div class="webgl-logo"></div>
        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
        <div class="title">Retro Game Cafe</div>
      </div>
    </div>


  <div class="line__container">
    <!-- タイトル -->
<!--
    <div class="line__title">
      トーキングルーム
    </div>
-->
    <!--  会話エリア scrollを外すと高さ固定解除 -->
    <div class="line__contents scroll">

      <!-- 相手のスタンプ -->
      <!-- 相手の吹き出し -->
      <div class="line__left">
        <div class="line__left-text">
          <div class="name">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
          <div class="text">　</div>
        </div>
      </div>

      <!-- 自分の吹き出し -->
      <div class="line__right">
        <div class="name">　</div>
        <div class="text">　</div>
      </div>


    </div>
    <!--　 会話エリア ここまで -->
  </div>

@endsection

@include('section.footer')

