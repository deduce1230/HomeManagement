@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')
<script type="text/javascript" src="/js/hm_rec_script.js"></script>

@include('section.header')

@section('content')
<div class="container">
    <h5> <a href='javascript:history.back();'>メニュー検索</a></h5>
    @if (session('poststatus'))
        <div class="alert alert-success mt-4 mb-4">
            {{ session('poststatus') }}
        </div>
    @endif

    <form class="meal-input-form" method="post" action="/cooking/search_exec" autocomplete="off">
      @csrf
<!--
      <h6>食事時（複数選択可）</h6>
      <div class="meal-select">
        @foreach ($meal_type as $row_record)
          <input id="select_meal{{ $row_record->meal_id }}" class="radio-inline__input" type="checkbox" name="meal_time" 
                 value="{{ $row_record->meal_id }}" checked>
          <label class="radio-inline__label" for="select_meal{{ $row_record->meal_id }}">{{ $row_record->meal_nm }}</label>
        @endforeach
          <label-last></label-last>
      </div>
      <p>
-->
      <a class="btn btn-primary" href="/cooking/search_menu_days">
            日付検索
      </a>
      <a class="btn btn-primary" href="/cooking/similar_search">
            類似検索
      </a>
      <a class="btn btn-primary" href="/cooking/hashtag_search">
            タグ検索
      </a>
      <p>

      <h6>検索種別</h6>
      <div class="meal-select">
          <input id="select_area0" class="radio-inline__input" type="radio" name="search_type" value="0" checked>
          <label class="radio-inline__label" for="select_area0">材料＆メニュー</label>
          <input id="select_area1" class="radio-inline__input" type="radio" name="search_type" value="1" >
          <label class="radio-inline__label" for="select_area1">材料</label>
          <input id="select_area2" class="radio-inline__input" type="radio" name="search_type" value="2" >
          <label class="radio-inline__label" for="select_area2">メニュー</label>
          <p>
          <h6>カテゴリ別</h6>
          <input id="select_area3" class="radio-inline__input" type="radio" name="search_type" value="3" > 
          <label class="radio-inline__label" for="select_area3">鶏肉</label>
          <input id="select_area4" class="radio-inline__input" type="radio" name="search_type" value="4" > 
          <label class="radio-inline__label" for="select_area4">豚肉</label>
          <input id="select_area5" class="radio-inline__input" type="radio" name="search_type" value="5" > 
          <label class="radio-inline__label" for="select_area5">牛肉</label>
          <input id="select_area6" class="radio-inline__input" type="radio" name="search_type" value="6" > 
          <label class="radio-inline__label" for="select_area6">魚</label>
          <input id="select_area7" class="radio-inline__input" type="radio" name="search_type" value="7" > 
          <label class="radio-inline__label" for="select_area7">挽き肉</label>
          <input id="select_area8" class="radio-inline__input" type="radio" name="search_type" value="8" > 
          <label class="radio-inline__label" for="select_area8">一品物</label>
          <label-last></label-last>
      </div>
<!--
      <p>
      <div class="meal-select">
          <input id="select_area21" class="radio-inline__input" type="radio" name="used_type"
                 value="1" checked>
          <label class="radio-inline__label" for="select_area21">食事済を検索</label>
          <input id="select_area22" class="radio-inline__input" type="radio" name="used_type"
                 value="0" >
          <label class="radio-inline__label" for="select_area22">未使用から検索</label>
          <label-last></label-last>
      </div>
-->
      <p>
      <h6>検索ワード(ひらがなカタカナは自動検索されます)</h6>
      <table style="border:none;">
          <tr><td style="border:none;">
              <div class="inputWithIcon">
                  <input type="text"  id="search_word"  autocomplete=”on”
			 name="search_word" 
                         value="{{ $search_wrd }}"
                         class="form-control  btn-input {{ $errors->has('search_word') ? 'is-invalid' : '' }}"
                         placeholder="5個まで空白でAND検索できます">
                        @if ($errors->has('search_word'))
                            <div class="invalid-feedback">
                                {{ $errors->first('search_word') }}
                            </div>
                        @endif

                  <i class="fas fa-search fa-lg fa-fw" aria-hidden="true"></i>

              </div>
          </td><td width=20px style="border:none;">
              <a href="#" class="btn-real btn-real2" onclick="recording('search_word','micicon')">
                  <i id="micicon" class="fas fa-microphone"></i>
              </a>
          </td></tr>
      </table>

<!--      <h6>万能検索(漢字や別名でも検索します)</h6>
      <div class="meal-select">
        @foreach ($meal_type as $row_record)
          <input id="select_meal{{ $row_record->meal_id }}" class="radio-inline__input" type="checkbox" name="meal_time" 
                 value="{{ $row_record->meal_id }}" checked>
          <label class="radio-inline__label" for="select_meal{{ $row_record->meal_id }}">{{ $row_record->meal_nm }}</label>
        @endforeach
          <label-last></label-last>
      </div>
-->


      <div class="py-3">
          <a class="btn btn-secondary" href="javascript:history.back()">
                戻る
          </a>
         <button type="submit" class="btn btn-primary">
               検索
         </button>

      </div>
    </form>

</div>

@endsection
@include('section.footer')

