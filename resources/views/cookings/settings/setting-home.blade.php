@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')

@section('content')
<h5><a href='/cooking_index'>設定メニュー</a></h5>
<div class="container">
    <div class="row justify-content-center">
                <div class="panel-menu">
                        <div class="panel-menu_item">
                                <a href="/cooking/setting/table">
                                        <div class="panel-menu_item_img"><img src="/images/cookings/data.png"></div>
                                </a>
                                <p>
                                        データベース管理。<br>
                                        データを直接編集できます。
                                </p>
                        </div>
                </div>
    </div>
</div>
@endsection

@include('section.footer')
