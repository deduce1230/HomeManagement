@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')


@section('content')
<div class="table-responsive">
    <h5> <a href='/cooking/setting/table'>マスタ管理　レシピテーブル</a></h5>
    <div class="mt-4 mb-4">
        <a href="{{ route('cooking.create') }}" class="btn btn-primary">
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
            <th>レシピID</th>
            <th>レシピ名</th>
            <th>URL</th>
            <th>おすすめ度</th>
            <th>料理ID</th>
            <th class="onlypc">更新日時</th>
            <th>処理</th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($cookings as $record)
            <form method="post" action="{{ route('cooking.destroy', $record->recipe_id) }}">
            @csrf
            @method('DELETE')
            <tr>
                <td>{{ $record->recipe_id }}</td>
                <td>{{ $record->recipe_nm }}</td>
                <td>{{ $record->ref_url }}</td>
                <td>{{ $record->recommend }}</td>
                <td>{{ $record->dish_id }}</td>
                <td class="onlypc">{{ $record->updated_at->format('Y.m.d') }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('cooking.edit', $record->recipe_id) }}" class="btn btn-success btn-sm">編集</a>
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
    {{ $cookings->links() }}
</div>
</div>
@endsection

@include('section.footer')

