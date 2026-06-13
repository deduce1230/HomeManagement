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
            レシピの編集
        </h1>

        <form method="post" action="{{ route('cooking.update', $record->recipe_id) }}">
            @csrf
            @method('PUT')

            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="subject">
                        レシピID
                    </label>
                    <input
                        id="recipe_id"
                        name="recipe_id"
                        class="form-control {{ $errors->has('recipe_id') ? 'is-invalid' : '' }}"
                        value="{{ $record->recipe_id }}"
                        type="text"
                        readonly
                    >
                    @if ($errors->has('recipe_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('recipe_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        レシピ名
                    </label>
                    <input
                        id="recipe_nm"
                        name="recipe_nm"
                        class="form-control {{ $errors->has('recipe_nm') ? 'is-invalid' : '' }}"
                        value="{{ $record->recipe_nm }}"
                        type="text"
                    >
                    @if ($errors->has('recipe_nm'))
                        <div class="invalid-feedback">
                            {{ $errors->first('recipe_nm') }}
                        </div>
                    @endif
                <div class="form-group">
                    <label for="subject">
                        URL
                    </label>
                    <input
                        id="ref_url"
                        name="ref_url"
                        class="form-control {{ $errors->has('ref_url') ? 'is-invalid' : '' }}"
                        value="{{ $record->ref_url }}"
                        type="text"
                    >
                    @if ($errors->has('ref_url'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ref_url') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        おすすめ度
                    </label>
                    <input
                        id="recommend"
                        name="recommend"
                        class="form-control {{ $errors->has('recommend') ? 'is-invalid' : '' }}"
                        value="{{ $record->recommend }}"
                        type="text"
                    >
                    @if ($errors->has('recommend'))
                        <div class="invalid-feedback">
                            {{ $errors->first('recommend') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        料理ID
                    </label>
                    <input
                        id="dish_id"
                        name="dish_id"
                        class="form-control {{ $errors->has('dish_id') ? 'is-invalid' : '' }}"
                        value="{{ $record->dish_id }}"
                        type="text"
                    >
                    @if ($errors->has('dish_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dish_id') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('cooking.index') }}">
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

