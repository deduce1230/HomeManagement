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
            料理カテゴリの新規登録
        </h1>

        <form method="POST" action="{{ route('cat_relation.store') }}">
            @csrf

            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="subject">
                        システムID
                    </label>
                    <input
                        id="rec_id"
                        name="rec_id"
                        class="form-control {{ $errors->has('rec_id') ? 'is-invalid' : '' }}"
                        value="{{ old('rec_id') }}"
                        type="text"
                    >
                    @if ($errors->has('rec_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('rec_id') }}
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
                        value="{{ old('dish_id') }}"
                        type="text"
                    >
                    @if ($errors->has('dish_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dish_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        種別ID
                    </label>
                    <input
                        id="cat_id"
                        name="cat_id"
                        class="form-control {{ $errors->has('cat_id') ? 'is-invalid' : '' }}"
                        value="{{ old('cat_id') }}"
                        type="text"
                    >
                    @if ($errors->has('cat_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cat_id') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('cat_relation.index') }}">
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

