@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')

@section('content')
<h5><a href='/cooking/setting'>テーブル設定</a></h5>
<div class="container">
    <div class="row justify-content-center">
        <ul class="hm">
             <li><a href="/cooking/setting/table/food_type"     >食材タイプマスタ(FOOD_TYPE)  </a></li>
             <li><a href="/cooking/setting/table/food_info"     >食材情報マスタ(FOOD_INFO)    </a></li>
             <li><a href="/cooking/setting/table/meal_category" >カテゴリマスタ(MEAL_CATEGORY)</a></li>
             <li><a href="/cooking/setting/table/meal_kind"     >菜種マスタ(MEAL_KIND)        </a></li>
             <li><a href="/cooking/setting/table/meal_type"     >食事種別マスタ(MEAL_TYPE)    </a></li>
             <li><a href="/cooking/setting/table/food_list"     >検索用食材リスト(FOOD_LIST)  </a></li>
             <li><a href="/cooking/setting/table/record"        >料理記録(RECORD)             </a></li>
             <li><a href="/cooking/setting/table/cooking"       >レシピ(COOKING)              </a></li>
             <li><a href="/cooking/setting/table/cooking_recipe">レシピ詳細(COOKING_RECIPE)   </a></li>
             <li><a href="/cooking/setting/table/dish_name"     >料理名称マスタ(DISH_NAME)    </a></li>
             <li><a href="/cooking/setting/table/cat_relation"  >料理カテゴリ(CAT_RELATION)   </a></li>

        </ul>
    </div>
</div>
@endsection

@include('section.footer')
