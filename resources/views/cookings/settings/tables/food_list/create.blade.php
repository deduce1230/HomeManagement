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
            検索食材名の新規登録
        </h1>

        <form method="POST" action="{{ route('food_list.store') }}">
            @csrf

            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="subject">
                        リストID
                    </label>
                    <input
                        id="list_id"
                        name="list_id"
                        class="form-control {{ $errors->has('list_id') ? 'is-invalid' : '' }}"
                        value="{{ old('list_id') }}"
                        type="text"
                    >
                    @if ($errors->has('list_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('list_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        リスト名
                    </label>
                    <input
                        id="list_nm"
                        name="list_nm"
                        class="form-control {{ $errors->has('list_nm') ? 'is-invalid' : '' }}"
                        value="{{ old('list_nm') }}"
                        type="text"
                    >
                    @if ($errors->has('list_nm'))
                        <div class="invalid-feedback">
                            {{ $errors->first('list_nm') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subject">
                        リストタイプ
                    </label>
                    <input
                        id="list_type"
                        name="list_type"
                        class="form-control {{ $errors->has('list_type') ? 'is-invalid' : '' }}"
                        value="{{ old('list_type') }}"
                        type="text"
                    >
                    @if ($errors->has('list_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('list_type') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('food_list.index') }}">
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

