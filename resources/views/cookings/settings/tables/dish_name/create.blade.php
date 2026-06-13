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
            料理名称マスタの新規登録
        </h1>

        <form method="POST" action="{{ route('dish_name.store') }}">
            @csrf

            <fieldset class="mb-4">
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
                        タイプ名
                    </label>
                    <input
                        id="dish_nm"
                        name="dish_nm"
                        class="form-control {{ $errors->has('dish_nm') ? 'is-invalid' : '' }}"
                        value="{{ old('dish_nm') }}"
                        type="text"
                    >
                    @if ($errors->has('dish_nm'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dish_nm') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        菜種ID
                    </label>
                    <input
                        id="kind_id"
                        name="kind_id"
                        class="form-control {{ $errors->has('kind_id') ? 'is-invalid' : '' }}"
                        value="{{ old('kind_id') }}"
                        type="text"
                    >
                    @if ($errors->has('kind_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kind_id') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('dish_name.index') }}">
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

