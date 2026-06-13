@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')


@section('content')
<div class="table-responsive">
    <h5> <a href='/cooking/setting/table'>マスタ管理　料理カテゴリテーブル</a></h5>
    <div class="mt-4 mb-4">
        <a href="{{ route('cat_relation.create') }}" class="btn btn-primary">
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
            <th>料理ID</th>
            <th>種別ID</th>
            <th class="onlypc">更新日時</th>
            <th>処理</th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($cat_relations as $cat_relation)
            <form method="post" action="{{ route('cat_relation.destroy', $cat_relation->rec_id) }}">
            @csrf
            @method('DELETE')
            <tr>
                <td>{{ $cat_relation->rec_id }}</td>
                <td>{{ $cat_relation->dish_id }}</td>
                <td>{{ $cat_relation->cat_id }}</td>
                <td class="onlypc">{{ $cat_relation->updated_at->format('Y.m.d') }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('cat_relation.edit', $cat_relation->rec_id) }}" class="btn btn-success btn-sm">編集</a>
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
    {{ $cat_relations->links() }}
</div>
</div>
@endsection

@include('section.footer')

