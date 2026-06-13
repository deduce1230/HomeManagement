@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')

@section('content')
<h5><a href='/'>献立くん</a></h5>
<div class="container">
    <div class="row justify-content-center">
                <div class="panel-menu">
                        <div class="panel-menu_item">
                                <a href="/cooking/search">
                                        <div class="panel-menu_item_img"><img src="/images/cookings/menu.png"></div>
                                </a>
                                <p>
                                        過去の献立やレシピ集<br>
                                        から検索できます。<br>
                                        バーチャルコックに<br>
                                        相談もできます。
                                </p>
                        </div>
                        <div class="panel-menu_item">
                                <a href="/cooking/record">
                                        <div class="panel-menu_item_img"><img src="/images/cookings/record.png"></div>
                                </a>
                                <p>
                                        献立の記録や新しい<br>
                                        レシピを登録すること<br>
                                        ができます。
                                </p>
                        </div>
                </div>
                <div class="panel-menu">
                        <div class="panel-menu_item">
                                <a href="cooking/analysis/{{ date('Y-m-d',strtotime('-7 day')) }}/{{ date('Y-m-d') }}">
                                        <div class="panel-menu_item_img"><img src="/images/cookings/analys.png"></div>
                                </a>
                                <p>
                                        過去の献立を分析して <br>
                                        最近の傾向を表示します。<br>
                                </p>
                        </div>
                        <div class="panel-menu_item">
                                <a href="/cooking/setting">
                                        <div class="panel-menu_item_img"><img src="/images/cookings/setting.png"></div>
                                </a>
                                <p>
                                        設定画面です。<br>
                                        通常は使いません。<br>
                                </p>
                        </div>
                </div>
    </div>
</div>
@endsection

@include('section.footer')
