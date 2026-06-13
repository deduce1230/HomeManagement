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
            食材タイプの編集
        </h1>

        <form method="post" action="{{ route('meal_type.update', $meal_type->meal_id) }}">
            @csrf
            @method('PUT')

            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="subject">
                        食材ID
                    </label>
                    <input
                        id="meal_id"
                        name="meal_id"
                        class="form-control {{ $errors->has('meal_id') ? 'is-invalid' : '' }}"
                        value="{{ $meal_type->meal_id }}"
                        type="text"
                        readonly
                    >
                    @if ($errors->has('meal_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('meal_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        タイプ名
                    </label>
                    <input
                        id="meal_nm"
                        name="meal_nm"
                        class="form-control {{ $errors->has('meal_nm') ? 'is-invalid' : '' }}"
                        value="{{ $meal_type->meal_nm }}"
                        type="text"
                    >
                    @if ($errors->has('meal_nm'))
                        <div class="invalid-feedback">
                            {{ $errors->first('meal_nm') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('meal_type.index') }}">
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

