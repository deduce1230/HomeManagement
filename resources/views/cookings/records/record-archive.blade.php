@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')
<script type="text/javascript" src="/js/hm_rec_script.js"></script>

@include('section.header')

@section('content')
<div class="container">
    <h5> <a href='javascript:history.back();'>メニュー記録 ～新規作成～</a></h5>
    @if (session('poststatus'))
        <div class="alert alert-success mt-4 mb-4">
            {{ session('poststatus') }}
        </div>
    @endif

    <form class="meal-input-form" method="post" action="/cooking/record/store_meal" autocomplete="off">
      @csrf
      <input type="hidden" name="recipe_id" value="{{$recipe_id}}">
      <h6>日付・食事時</h6>
      <div class="item">
        <input type="date" id="meal_date" name="meal_date" value="{{ $target_date->format('Y-m-d') }}">
      </div>

      <div class="meal-select">
        @foreach ($meal_type as $row_record)
          @if ($row_record->meal_id === 4)
              <?php $defalut_value = 'checked'; ?>
          @else
              <?php $defalut_value = ''; ?>
          @endif
          <input id="select{{ $row_record->meal_id }}" class="radio-inline__input" type="radio" name="meal_time" 
                 value="{{ $row_record->meal_id }}" {{$defalut_value}}>
          <label class="radio-inline__label" for="select{{ $row_record->meal_id }}">{{ $row_record->meal_nm }}</label>
        @endforeach
          <label-last></label-last>
      </div>

      <p>
      <?php
         if ($recipe_id > 0){
            // -- レシピ参照モード -- 
            $readonly_class = "nochange";
            $readonly_flg = "readonly";
            $mic_class = "fas fa-microphone-slash";
            $mic_function = "";
            $txt_recipe_nm = $cooking_info[0]->recipe_nm;
            $txt_ref_url = $cooking_info[0]->ref_url;
            $msg = "(青字部分は変更できません)";
         }else{
            // -- レシピ新規登録モード -- 
            $readonly_flg = "";
            $readonly_class = "";
            $mic_class = "fas fa-microphone";
            $mic_function = "recording('recipe_nm','micicon')";
            $txt_recipe_nm = "";
            $txt_ref_url = "";
            $msg = "";
         }
      ?>
      <h6>メニュー内容 <font color='blue'>{{$msg}}</font> </h6>
      <table style="border:none;">
          <tr><td style="border:none;">
              <div class="inputWithIcon">
                  <input type="text"  id="recipe_nm"  value="{{$txt_recipe_nm}}"
                         name="recipe_nm" 
                         class="form-control {{ $errors->has('recipe_nm') ? 'is-invalid' : '' }} btn-input {{$readonly_class}}"
                         placeholder="メニュー名"  {{$readonly_flg}}>

                  <i class="fas fa-utensils fa-lg fa-fw" aria-hidden="true"></i>
                       @if ($errors->has('recipe_nm'))
                           <div class="invalid-feedback">
                                {{ $errors->first('recipe_nm') }}
                           </div>
                       @endif
              </div>
              </td>
              <td width=20px style="border:none;">
                  <a href="#" class="btn-real btn-real2" onclick="{{$mic_function}}">
                     <i id="micicon" class="{{$mic_class}}"></i>
                  </a>
              </td>
          </tr>
      </table>

      <div class="inputWithIcon">
          <input type="text"  id="ref_url" value="{{$txt_ref_url}}"
                 name="ref_url" 
                 class="form-control {{ $errors->has('ref_url') ? 'is-invalid' : '' }}  {{$readonly_class}}"
                 placeholder="参照URL"  {{$readonly_flg}}>
          <i class="fas fa-globe fa-lg fa-fw" aria-hidden="true"></i>
               @if ($errors->has('ref_url'))
                   <div class="invalid-feedback">
                        {{ $errors->first('ref_url') }}
                   </div>
               @endif
      </div>


      <h6>食べた人 </h6>
      <div class="meal-select">
          <input id="eater01" class="radio-inline__input" type="radio" name="eater_id" 
                 value="0" checked>
          <label class="radio-inline__label" for="eater01">二人</label>
          <input id="eater02" class="radio-inline__input" type="radio" name="eater_id" 
                 value="1" >
          <label class="radio-inline__label" for="eater02">直志</label>
          <input id="eater03" class="radio-inline__input" type="radio" name="eater_id" 
                 value="2" >
          <label class="radio-inline__label" for="eater03">裕子</label>
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

         <a class="btn btn-outline-info" href="/cooking/search_menu">
               検索画面
         </a>
      </div>
    </form>
</div>

@endsection
@include('section.footer')

