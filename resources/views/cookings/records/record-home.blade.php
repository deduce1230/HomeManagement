@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')

@section('content')
<h5><a href='/cooking_index'>記録メニュー</a></h5>
<div class="container">
    <div class="row justify-content-center">
                <div class="panel-menu">
                        <div class="panel-menu_item">
<!--
                                <a href="/cooking/record/rec_recipe">
-->
                                <a href="/cooking/record/rec_recipe/0">
                                        <div class="panel-menu_item_img"><img src="/images/cookings/rec_menu.png"></div>
                                </a>
                                <p>
                                        レシピ登録。<br>
                                        新しいメニューをどんどん登録しましょう。
                                </p>
                        </div>
                        <div class="panel-menu_item">
                                <a href="/cooking/record/rec_meal/0">
                                        <div class="panel-menu_item_img"><img src="/images/cookings/rec_meal.png"></div>
                                </a>
                                <p>
                                        今日のご飯。<br>
                                        食事のメニューを記録しましょう。
                                </p>
                        </div>
                </div>
    </div>
</div>
@endsection

@include('section.footer')
