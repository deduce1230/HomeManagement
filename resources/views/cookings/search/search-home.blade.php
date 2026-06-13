@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')

@section('content')
<h5><a href='/cooking_index'>献立サーチ</a></h5>
<div class="container">
    <div class="row justify-content-center">
                <div class="panel-menu">
                        <div class="panel-menu_item">
                                <a href="/cooking/suggestion_menu/{{date('Y-m-d')}}/1">
                                        <div class="panel-menu_item_img"><img src="/images/cookings/today.png"></div>
                                </a>
                                <p>
                                        おすすめレシピを<br>
                                        問い合わせましょう
                                </p>
                        </div>
                </div>
                <div class="panel-menu">
                        <div class="panel-menu_item">
                                <a href="/cooking/search_menu">
                                        <div class="panel-menu_item_img"><img src="/images/cookings/search.png"></div>
                                </a>
                                <p>
                                        過去の献立やレシピ集<br>
                                        からの検索です。
                                </p>
                        </div>
                </div>
    </div>
</div>
@endsection

@include('section.footer')
