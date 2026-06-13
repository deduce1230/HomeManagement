@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')


@section('content')
<div class="table-responsive">
    <h5> <a href='/cooking/setting/table'>マスタ管理　レシピ詳細テーブル</a></h5>
    <div class="mt-4 mb-4">
        <a href="{{ route('cooking_recipe.create') }}" class="btn btn-primary">
            投稿の新規作成
        </a>
    </div>
    @if (session('poststatus'))
        <div class="alert alert-success mt-4 mb-4">
            {{ session('poststatus') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead>
        <tr>
            <th>システムID</th>
            <th>レシピID</th>
            <th>材料名</th>
            <th>食材ID</th>
            <th>量</th>
            <th>人数</th>
            <th class="onlypc">更新日時</th>
            <th>処理</th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($cooking_recipes as $record)
            <form method="post" action="{{ route('cooking_recipe.destroy', $record->rec_id) }}">
            @csrf
            @method('DELETE')
            <tr>
                <td>{{ $record->rec_id }}</td>
                <td>{{ $record->recipe_id }}</td>
                <td>{{ $record->ingredients }}</td>
                <td>{{ $record->food_id }}</td>
                <td>{{ $record->amount }}</td>
                <td>{{ $record->for_num }}</td>
                <td class="onlypc">{{ $record->updated_at->format('Y.m.d') }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('cooking_recipe.edit', $record->rec_id) }}" class="btn btn-success btn-sm">編集</a>
                         <button type="submit" class="btn btn-danger btn-sm">
                            削除
                         </button>

                </td>
            </tr>
            </form>
        @endforeach
        </tbody>
    </table>

<div class="d-flex justify-content-center mb-5">
    {{ $cooking_recipes->links() }}
</div>
</div>
@endsection

@include('section.footer')

