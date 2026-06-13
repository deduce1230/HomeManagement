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
            カテゴリマスタの編集
        </h1>

        <form method="post" action="{{ route('meal_category.update', $meal_category->cat_id) }}">
            @csrf
            @method('PUT')

            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="subject">
                        種別ID
                    </label>
                    <input
                        id="cat_id"
                        name="cat_id"
                        class="form-control {{ $errors->has('cat_id') ? 'is-invalid' : '' }}"
                        value="{{ $meal_category->cat_id }}"
                        type="text"
                        readonly
                    >
                    @if ($errors->has('cat_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cat_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        種別名
                    </label>
                    <input
                        id="cat_nm"
                        name="cat_nm"
                        class="form-control {{ $errors->has('cat_nm') ? 'is-invalid' : '' }}"
                        value="{{ $meal_category->cat_nm }}"
                        type="text"
                    >
                    @if ($errors->has('cat_nm'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cat_nm') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('meal_category.index') }}">
                        キャンセル
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

