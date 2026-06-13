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
            菜種マスタの編集
        </h1>

        <form method="post" action="{{ route('meal_kind.update', $meal_kind->kind_id) }}">
            @csrf
            @method('PUT')

            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="subject">
                        菜種ID
                    </label>
                    <input
                        id="kind_id"
                        name="kind_id"
                        class="form-control {{ $errors->has('kind_id') ? 'is-invalid' : '' }}"
                        value="{{ $meal_kind->kind_id }}"
                        type="text"
                        readonly
                    >
                    @if ($errors->has('kind_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kind_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        菜種名
                    </label>
                    <input
                        id="kind_nm"
                        name="kind_nm"
                        class="form-control {{ $errors->has('kind_nm') ? 'is-invalid' : '' }}"
                        value="{{ $meal_kind->kind_nm }}"
                        type="text"
                    >
                    @if ($errors->has('kind_nm'))
                        <div class="invalid-feedback">
                            {{ $errors->first('kind_nm') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('meal_kind.index') }}">
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

