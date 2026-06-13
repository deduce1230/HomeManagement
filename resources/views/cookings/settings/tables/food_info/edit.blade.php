@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')

@include('section.head')
@include('section.header')

@section('content')
<div class="container mt-4">
    <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">
            食材情報マスタの編集
        </h1>

        <form method="post" action="/cooking/setting/table/food_info/{{$food_info->food_id}}">
            @csrf
            @method('PUT')

            <input type="hidden" name="pg_from" value="{{$pg_from}}">

            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="subject">
                        食材ID
                    </label>
                    <input
                        id="food_id"
                        name="food_id"
                        class="form-control {{ $errors->has('food_id') ? 'is-invalid' : '' }}"
                        value="{{ $food_info->food_id }}"
                        type="text"
                        readonly
                    >
                    @if ($errors->has('food_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('food_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        食材名
                    </label>
                    <input
                        id="food_nm"
                        name="food_nm"
                        class="form-control {{ $errors->has('food_nm') ? 'is-invalid' : '' }}"
                        value="{{ $food_info->food_nm }}"
                        type="text"
                    >
                    @if ($errors->has('food_nm'))
                        <div class="invalid-feedback">
                            {{ $errors->first('food_nm') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        食品群
                    </label>
                    <input
                        id="group_num"
                        name="group_num"
                        class="form-control {{ $errors->has('group_num') ? 'is-invalid' : '' }}"
                        value="{{ $food_info->group_num }}"
                        type="text"
                    >
                    @if ($errors->has('group_num'))
                        <div class="invalid-feedback">
                            {{ $errors->first('group_num') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        分類名
                    </label>
                    <input
                        id="group_subname"
                        name="group_subname"
                        class="form-control {{ $errors->has('group_subname') ? 'is-invalid' : '' }}"
                        value="{{ $food_info->group_subname }}"
                        type="text"
                    >
                    @if ($errors->has('group_subname'))
                        <div class="invalid-feedback">
                            {{ $errors->first('group_subname') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="subject">
                        旬開始
                    </label>
                    <input
                        id="season_s"
                        name="season_s"
                        class="form-control {{ $errors->has('season_s') ? 'is-invalid' : '' }}"
                        value="{{ $food_info->season_s }}"
                        type="text"
                    >
                    @if ($errors->has('season_s'))
                        <div class="invalid-feedback">
                            {{ $errors->first('season_s') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        旬終了
                    </label>
                    <input
                        id="season_e"
                        name="season_e"
                        class="form-control {{ $errors->has('season_e') ? 'is-invalid' : '' }}"
                        value="{{ $food_info->season_e }}"
                        type="text"
                    >
                    @if ($errors->has('season_e'))
                        <div class="invalid-feedback">
                            {{ $errors->first('season_e') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="javascript:history.back()">
                        戻る
                    </a>

                    <button type="submit" class="btn btn-primary">
                        登録する
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection

@include('section.footer')

