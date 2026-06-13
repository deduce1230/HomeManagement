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
<div class="container">
    <h5> <a href='javascript:history.back();'>バーチャルコック ～インタビュー～</a></h5>

      <!-- 相手の吹き出し -->
  <div class="line__container">

      <div class="line__left">
        <figure>
          <img src="/images/stamps/1.png" />
        </figure>
        <div class="line__left-text">
          <div class="name">コック</div>
          <div class="text">飲みすぎちゃってますー</div>
        </div>
      </div>
    </div>


    @if (session('poststatus'))
        <div class="alert alert-success mt-4 mb-4">
            {{ session('poststatus') }}
        </div>
    @endif

    <form class="meal-input-form" method="post" action="/cooking/record/store_meal" autocomplete="off">
      @csrf
      <input type="hidden" name="recipe_id" value="">
      <h6>日付・食事時 <span style="color: #ff0000;">（現バージョンでは選択できません）</span></h6>
      <div class="item">
        <input type="date" id="meal_date" name="meal_date" value='{{ date('Y-m-d') }}' disabled>
      </div>
      
      <div class="meal-select">
        @foreach ($meal_type as $row_record)
          @if ($row_record->meal_id === 4)
              <?php $defalut_value = 'checked'; ?>
          @else
              <?php $defalut_value = 'disabled'; ?>
          @endif
          <input id="select{{ $row_record->meal_id }}" class="radio-inline__input" type="radio" name="meal_time" 
                 value="{{ $row_record->meal_id }}" {{$defalut_value}}>
          <label class="radio-inline__label" for="select{{ $row_record->meal_id }}">{{ $row_record->meal_nm }}</label>
        @endforeach
          <label-last></label-last>
      </div>

      <p>
      <h6>料理種別指定 </h6>
      <div class="meal-select">
        @foreach ($type_master as $row_record)
          <input id="select_kind{{ $row_record->kind_id }}" class="radio-inline__input" type="radio" name="meal_kind"
                 value="{{ $row_record->descript }}" >
          <label class="radio-inline__label" for="select_kind{{ $row_record->kind_id }}">{{ $row_record->descript }}</label>
        @endforeach
          <input id="select_kind99" class="radio-inline__input" type="radio" name="meal_kind"
                 value="おすすめ" checked>
          <label class="radio-inline__label" for="select_kind99">おすすめ</label>
          <label-last></label-last>
      </div>

      <p>
      <h6>食材指定<span style="color: #ff0000;">（現バージョンでは選択できません）</span> </h6>
      <div class="meal-select">
        @foreach ($food_list as $row_record)
          @if ($row_record->list_id === 99)
              <?php $defalut_value = 'checked'; ?>
          @else
              <?php $defalut_value = 'disabled'; ?>
          @endif
          <input id="select_ing{{ $row_record->list_id }}" class="radio-inline__input" type="checkbox" name="meal_ing"
                 value="{{ $row_record->list_nm }}" {{$defalut_value}}>
          <label class="radio-inline__label" for="select_ing{{ $row_record->list_id }}">{{ $row_record->list_nm }}</label>
        @endforeach
          <label-last></label-last>
      </div>


      <div class="py-3">
          <a class="btn btn-secondary" href="javascript:history.back()">
                戻る
          </a>
         <button type="submit" class="btn btn-primary">
               登録
         </button>

         <a class="btn btn-success" href="/cooking/show">
               記録確認
         </a>
      </div>
    </form>
</div>

@endsection
@include('section.footer')

