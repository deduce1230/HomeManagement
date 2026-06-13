@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')
<!-- 画像操作用のCSS＆JS -->
<link href="/css/hm_style_camera.css" rel="stylesheet">
<script type="text/javascript" src="/js/hm_rec_script.js"></script>
@include('section.header')

@section('content')

<h5><a href='/cooking/setting'>在庫管理-リスト一覧</a></h5>
<div class="container">
    <div class="row justify-content-center">
        <ul class="hm">
             <li><a href="/stock/list/0"     >非常用備品リスト（総合）</a></li>
             <li><a href="/stock/list/1"     >　―＞直志リュック</a></li>
             <li><a href="/stock/list/2"     >　―＞裕子リュック</a></li>
             <li><a href="/stock/list/3"     >　―＞その他</a></li>
	</ul>
    </div>
    <p>
    <div class="row justify-content-center">
        <ul class="hm">
             <li><a href="/stock/list/10"     >買い物テスト</a></li>
             <li><a href="/stock/list/11"     >　―＞ライフ</a></li>
             <li><a href="/stock/list/12"     >　―＞サミット</a></li>
             <li><a href="/stock/list/13"     >　―＞シマダヤ</a></li>
             <li><a href="/stock/list/14"     >　―＞三徳</a></li>
             <li><a href="/stock/list/15"     >　―＞マルエツ</a></li>
             <li><a href="/stock/list/16"     >　―＞まいばすけっと</a></li>
        </ul>
    </div>
</div>
@endsection

@include('section.footer')
