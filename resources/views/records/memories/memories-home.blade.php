@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')

@section('content')
<h5><a href='/'>思い出アルバム</a></h5>
<div class="container">
    <h6>結婚前</h6>
    <div class="row justify-content-center">
        <ul class="hm">
             <li><a href="/memories/show/2019061801" >初めての誕生日</a></li>
             <li><a href="/memories/show/2018000000" >モンブランの思い出</a></li>
             <li><a href="/memories/show/2019021701" >ねこペンカフェ</a></li>
             <li><a href="/memories/show/2019120901" >クイーンズホテル</a></li>
             <li><a href="/memories/show/2019122401" >初めてのクリスマス</a></li>
        </ul>
    </div>
    <h6>結婚式</h6>
    <div class="row justify-content-center">
        <ul class="hm">
             <li><a href="/memories/show/2019051201" >結婚式写真集(オークラ撮影)</a></li>
             <li><a href="/memories/show/2019051202" >結婚式写真集(純子姉さん撮影)</a></li>
             <li><a href="/memories/show/2019051203" >結婚式写真集(動画)</a></li>
        </ul>
    </div>
</div>
@endsection

@include('section.footer')
