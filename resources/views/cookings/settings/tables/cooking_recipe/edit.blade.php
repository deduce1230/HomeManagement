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
            レシピ詳細の編集
        </h1>

        <form method="post" action="{{ route('cooking_recipe.update', $record->rec_id) }}">
            @csrf
            @method('PUT')

            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="subject">
                        システムID
                    </label>
                    <input
                        id="rec_id"
                        name="rec_id"
                        class="form-control {{ $errors->has('rec_id') ? 'is-invalid' : '' }}"
                        value="{{ $record->rec_id }}"
                        type="text"
                        readonly
                    >
                    @if ($errors->has('rec_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('rec_id') }}
                        </div>
                    @endif
                </div>
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
                    >
                    @if ($errors->has('recipe_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('recipe_id') }}
                        </div>
                    @endif
                <div class="form-group">
                    <label for="subject">
                        材料名
                    </label>
                    <input
                        id="ingredients"
                        name="ingredients"
                        class="form-control {{ $errors->has('ingredients') ? 'is-invalid' : '' }}"
                        value="{{ $record->ingredients }}"
                        type="text"
                    >
                    @if ($errors->has('ingredients'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ingredients') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        食材ID
                    </label>
                    <input
                        id="food_id"
                        name="food_id"
                        class="form-control {{ $errors->has('food_id') ? 'is-invalid' : '' }}"
                        value="{{ $record->food_id }}"
                        type="text"
                    >
                    @if ($errors->has('food_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('food_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        量
                    </label>
                    <input
                        id="amount"
                        name="amount"
                        class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}"
                        value="{{ $record->amount }}"
                        type="text"
                    >
                    @if ($errors->has('amount'))
                        <div class="invalid-feedback">
                            {{ $errors->first('amount') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        人数
                    </label>
                    <input
                        id="for_num"
                        name="for_num"
                        class="form-control {{ $errors->has('for_num') ? 'is-invalid' : '' }}"
                        value="{{ $record->for_num }}"
                        type="text"
                    >
                    @if ($errors->has('for_num'))
                        <div class="invalid-feedback">
                            {{ $errors->first('for_num') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('cooking_recipe.index') }}">
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

