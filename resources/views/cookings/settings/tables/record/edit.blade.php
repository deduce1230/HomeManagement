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
            料理記録の編集
        </h1>

        <form method="post" action="{{ route('record.update', $record->rec_id) }}">
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
                        日付
                    </label>
                    <input
                        id="meal_date"
                        name="meal_date"
                        class="form-control {{ $errors->has('meal_date') ? 'is-invalid' : '' }}"
                        value="{{ $record->meal_date }}"
                        type="text"
                    >
                    @if ($errors->has('meal_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('meal_date') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        食事ID
                    </label>
                    <input
                        id="meal_id"
                        name="meal_id"
                        class="form-control {{ $errors->has('meal_id') ? 'is-invalid' : '' }}"
                        value="{{ $record->meal_id }}"
                        type="text"
                    >
                    @if ($errors->has('meal_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('meal_id') }}
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
                </div>
                <div class="form-group">
                    <label for="subject">
                        予定フラグ
                    </label>
                    <input
                        id="flg_sch"
                        name="flg_sch"
                        class="form-control {{ $errors->has('flg_sch') ? 'is-invalid' : '' }}"
                        value="{{ $record->flg_sch }}"
                        type="text"
                    >
                    @if ($errors->has('flg_sch'))
                        <div class="invalid-feedback">
                            {{ $errors->first('flg_sch') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        評価点数
                    </label>
                    <input
                        id="score"
                        name="score"
                        class="form-control {{ $errors->has('score') ? 'is-invalid' : '' }}"
                        value="{{ $record->score }}"
                        type="text"
                    >
                    @if ($errors->has('score'))
                        <div class="invalid-feedback">
                            {{ $errors->first('score') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        コメント
                    </label>
                    <input
                        id="memo"
                        name="memo"
                        class="form-control {{ $errors->has('memo') ? 'is-invalid' : '' }}"
                        value="{{ $record->memo }}"
                        type="text"
                    >
                    @if ($errors->has('memo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('memo') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('record.index') }}">
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

