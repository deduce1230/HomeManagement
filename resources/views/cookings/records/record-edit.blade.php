@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')

@section('content')
<!--
<div class="container">
-->
    <h5> <a href='/cooking/record/'>メニュー記録  ～編集画面～</a></h5>
    @if (session('poststatus'))
        <div class="alert alert-success mt-4 mb-4">
            {{ session('poststatus') }}
        </div>
    @endif

    <form class="meal-input-form" method="post" action="/cooking/record/update_meal" autocomplete="off">
      @csrf
      <h6>日付・食事時</h6>
      <input type="hidden" id="rec_id"    name="rec_id"    value='{{ $record[0]->rec_id }}'    >
      <input type="hidden" id="recipe_id" name="recipe_id" value='{{ $cooking[0]->recipe_id }}'>

      <div class="item">
        <input type="date" id="meal_date" name="meal_date" value='{{ $record[0]->meal_date }}'>
      </div>

      <div class="meal-select">
        @foreach ($meal_type as $row_record)
          @if ($row_record->meal_id === $record[0]->meal_id)
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

      <p></p>
      <h6>メニュー内容</h6>
      <div class="inputWithIcon">
          <input type="text"  id="recipe_nm" 
                 name="recipe_nm" 
                 class="form-control {{ $errors->has('recipe_nm') ? 'is-invalid' : '' }}"
                 placeholder="メニュー名"
                 value="{{ $cooking[0]->recipe_nm }}">

          <i class="fas fa-utensils fa-lg fa-fw" aria-hidden="true"></i>
               @if ($errors->has('recipe_nm'))
                   <div class="invalid-feedback">
                        {{ $errors->first('recipe_nm') }}
                   </div>
               @endif
      </div>

      <div class="inputWithIcon">
          <input type="text"  id="ref_url" 
                 name="ref_url" 
                 class="form-control {{ $errors->has('ref_url') ? 'is-invalid' : '' }}"
                 placeholder="参照URL"
                 @if ($flg_enable_del_menu ==false)
                     readonly
                 @endif
                 value="{{ $cooking[0]->ref_url }}"
                 >
          <i class="fas fa-globe fa-lg fa-fw" aria-hidden="true"></i>
               @if ($errors->has('ref_url'))
                   <div class="invalid-feedback">
                        {{ $errors->first('ref_url') }}
                   </div>
               @endif
      </div>

      <h6>食べた人</h6>
      <div class="meal-select">
          <?php $checked_value=array('','',''); ?>
          @if ($record[0]->eater_id === 0 || is_null($record[0]->eater_id))
              <?php $checked_value[0] = 'checked'; ?>
          @elseif ($record[0]->eater_id === 1)
              <?php $checked_value[1] = 'checked'; ?>
          @else
              <?php $checked_value[2] = 'checked'; ?>
          @endif
          <input id="eater01" class="radio-inline__input" type="radio" name="eater_id" 
                 value="0" {{ $checked_value[0] }}>
          <label class="radio-inline__label" for="eater01">二人</label>
          <input id="eater02" class="radio-inline__input" type="radio" name="eater_id" 
                 value="1" {{ $checked_value[1] }}>
          <label class="radio-inline__label" for="eater02">直志</label>
          <input id="eater03" class="radio-inline__input" type="radio" name="eater_id" 
                 value="2" {{ $checked_value[2] }}>
          <label class="radio-inline__label" for="eater03">裕子</label>
          <label-last></label-last>
      </div>

      <div class="py-3">
          <a class="btn btn-secondary" href="javascript:history.back()">
                戻る
          </a>
         <button type="submit" class="btn btn-primary" >
               編集保存 
         </button>

         <a class="btn btn-success" href="/cooking/show">
               記録確認
         </a>
      </div>

      <div class="py-3">
         <a class="btn btn-danger" onClick="return confirm('レシピ情報は残して削除します。よろしいですか？');" 
            href="/cooking/record/rec_del1/{{$record[0]->rec_id}}">
               記録のみ削除
         </a>

         <a class="btn btn-dark"   onClick="return confirm('レシピと記録の両方を削除します。よろしいですか？');" 
            href="/cooking/record/rec_del2/{{$record[0]->rec_id}}/{{ $cooking[0]->recipe_id}}">
               記録とレシピの削除
         </a>
      </div>

    </form>

@endsection
@include('section.footer')

