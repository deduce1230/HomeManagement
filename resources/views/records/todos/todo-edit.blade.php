@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@section('pageCss')
  <link href="/css/lightbox/photos-style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/css/lightbox/lightbox.css">
  <script src="/js/lightbox/lightbox-plus-jquery.min.js"></script>
  <link rel="stylesheet" href="/css/hm_radio.css">
  <link rel="stylesheet" href="/css/hm_style_select.css">
  <link rel="stylesheet" href="/css/hm_style_acordion.css">
  <link rel="stylesheet" href="/css/hm_spinner.css">
@endsection
@include('section.head')
<script type="text/javascript" src="/js/hm_rec_script.js"></script>

@include('section.header')

@section('content')
<h5><a href='javascript:history.back()'>TO-DO リスト 編集</a></h5>
<!--
<div class="container row justify-content-start">
-->
    @if (session('poststatus'))
        <div class="hm-alert">
        <div class="alert alert-success mt-4 mb-4">
            {{ session('poststatus') }}
        </div>
        </div>
    @endif

<!--
    <input id="todo_cat_list" class="acd-check" type="checkbox" checked="checked">
    <label class="acd-label" for="todo_cat_list">新規作成</label>
    <div class="acd-content">
-->
      <form class="meal-input-form" method="post" action="/hm_todo/list_update_one" autocomplete="off">
      @csrf

        <div class="hm_select">
            <select required name="cat_id">
        <?php $cnt_check = 0 ?>
	@foreach ($todo_cats as $todo_cat)
	        @if ($todo_cat -> cat_id == $todo_shows[0]->cat_id)
	            <option value="{{ $todo_cat->cat_id }}" selected>{{ $todo_cat->cat_nm }}</option>
		@else
		    <option value="{{ $todo_cat->cat_id }}">{{ $todo_cat->cat_nm }}</option>
	        @endif
        @endforeach
            </select>
	</div>

	<input type="hidden" id="rec_id"    name="rec_id"    value='{{ $todo_shows[0]->rec_id }}'    >
	<input type="hidden" id="flg_fin"   name="flg_fin"   value='{{ $todo_shows[0]->flg_fin}}'    >

        <div>
            <input type="date" id="fin_until" name="fin_until" value="{{$todo_shows[0]->fin_until}}">
            (期限なしなら入力不要)
        </div>
        <table class="td-no-border">
            <tr><td class="td-no-border">
                <div class="inputWithIcon">
                          <input type="text"  id="todo_mission"  autocomplete=”on”
                                 name="todo_mission" 
				 class="form-control  btn-input {{ $errors->has('todo_mission') ? 'is-invalid' : '' }}"
                                 value="{{$todo_shows[0]->mission}}"
                                 placeholder="TODO内容を記載してください">
                                @if ($errors->has('todo_mission'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('todo_mission') }}
                                    </div>
                                @endif

                          <i class="fas fa-search fa-lg fa-fw" aria-hidden="true"></i>
                </div>
            </td><td class="td-no-border">
                <div>
                      <a href="#" class="btn-real btn-real2" onclick="recording('todo_mission','micicon');">
                          <i id="micicon" class="fas fa-microphone"></i>
                      </a>
                </div>
            </td></tr>

            <tr rowspan=2><td class="td-no-border">
                <div class="inputWithIcon">
                <input type="text"  id="ref_url" 
                       name="ref_url"
		       class="form-control {{ $errors->has('ref_url') ? 'is-invalid' : '' }}"
                       value="{{$todo_shows[0]->ref_url}}"
                       placeholder="参照URL">
                <i class="fas fa-globe fa-lg fa-fw" aria-hidden="true"></i>
                     @if ($errors->has('ref_url'))
                         <div class="invalid-feedback">
                              {{ $errors->first('ref_url') }}
                         </div>
                     @endif
                </div>
            </td></tr>

            <tr><td class="td-no-border">
                 <div class="spinner_area" style="display:flex">
                     <input type="number" value="{{$todo_shows[0]->alert_days}}" style="width:60px" class="counter1" 
                            data-max="365" data-min="0" name="alert_days">
                     <input type="button" value="＋" class="btnspinner" data-cal="1" data-target=".counter1">
                     <input type="button" value="－" class="btnspinner" data-cal="-1" data-target=".counter1">
                     <div style="margin-left:5px">
                     日前からアラート<br><font size=1>(期限なしなら無効)</font>
                     </div>
                 </div>
            </td></tr>
        </table>
        <div class="col text-center">
         <button type="submit" class="btn btn-primary btn-sm btn-block">
               編集結果を保存
         </button>
        </div>
        <div style="margin:10px 0 10px 0" class="col text-center">
         <div type="button" class="btn btn-secondary btn-sm btn-block" onClick="javascript:history.back()">
              保存せずに戻る
         </div>
        </div>
      </form>
<!--
    </div>
-->

<!-- スピナー用JS -->
<script type="text/javascript"src="/js/hm_spinner.js"></script>

@endsection

@include('section.footer')
