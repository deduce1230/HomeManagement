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

        <form method="post" action="{{ route('food_type.update', $food_type->type_id) }}">
            @csrf
            @method('PUT')

            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="subject">
                        食材ID
                    </label>
                    <input
                        id="type_id"
                        name="type_id"
                        class="form-control {{ $errors->has('type_id') ? 'is-invalid' : '' }}"
                        value="{{ $food_type->type_id }}"
                        type="text"
                        readonly
                    >
                    @if ($errors->has('type_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('type_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        タイプ名
                    </label>
                    <input
                        id="type_nm"
                        name="type_nm"
                        class="form-control {{ $errors->has('type_nm') ? 'is-invalid' : '' }}"
                        value="{{ $food_type->type_nm }}"
                        type="text"
                    >
                    @if ($errors->has('type_nm'))
                        <div class="invalid-feedback">
                            {{ $errors->first('type_nm') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('food_type.index') }}">
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

