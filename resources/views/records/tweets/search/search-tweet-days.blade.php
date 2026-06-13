@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')
<script type="text/javascript" src="/js/hm_rec_script.js"></script>

@include('section.header')

@section('content')
<div class="container">
    <h5> <a href='/cooking/record/'>一言日記日付検索</a></h5>
    @if (session('poststatus'))
        <div class="alert alert-success mt-4 mb-4">
            {{ session('poststatus') }}
        </div>
    @endif

    <form class="meal-input-form" method="post" action="/cooking/search_exec" autocomplete="off">
      @csrf
      <h6>検索日付</h6>
      <div class="item">
        <input type="date" id="meal_date_s" name="meal_date_s" value='{{ date('Y-m-d') }}' onchange="set_days();">
        　～　
        <input type="date" id="meal_date_e" name="meal_date_e" value='{{ date('Y-m-d') }}'>
      </div>

      <div class="py-3">
          <a class="btn btn-secondary" href="javascript:history.back()">
                戻る
          </a>
         <a class="btn btn-success" href="javascript:search_days()">
               検索
         </a>

      </div>
    </form>

</div>

<script type="text/javascript">
function search_days(){
// 選択した日付範囲でメニュー検索をかける
   var date_s = document.getElementById("meal_date_s");
   var date_e = document.getElementById("meal_date_e");
   window.location.href='/hm_twitter/search_calendar/' + date_s.value + '/' + date_e.value; 
}
function set_days(){
   var date_s = document.getElementById("meal_date_s");
   var date_e = document.getElementById("meal_date_e");
   date_e.value = date_s.value;
}
</script>

@endsection
@include('section.footer')

