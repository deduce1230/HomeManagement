@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')


@section('content')
<div class="table-responsive">
    <h5> <a href='/cooking/setting/table'>マスタ管理　料理記録テーブル</a></h5>
    <div class="mt-4 mb-4">
        <a href="{{ route('record.create') }}" class="btn btn-primary">
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
            <th>日付</th>
            <th>食事ID</th>
            <th>レシピID</th>
            <th>予定フラグ</th>
            <th>評価点数</th>
            <th>コメント</th>
            <th class="onlypc">更新日時</th>
            <th>処理</th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($records as $record)
            <form method="post" action="{{ route('record.destroy', $record->rec_id) }}">
            @csrf
            @method('DELETE')
            <tr>
                <td>{{ $record->rec_id }}</td>
                <td>{{ $record->meal_date }}</td>
                <td>{{ $record->meal_id }}</td>
                <td>{{ $record->recipe_id }}</td>
                <td>{{ $record->flg_sch }}</td>
                <td>{{ $record->score }}</td>
                <td>{{ $record->memo }}</td>
                <td class="onlypc">{{ $record->updated_at->format('Y.m.d') }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('record.edit', $record->rec_id) }}" class="btn btn-success btn-sm">編集</a>
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
    {{ $records->links() }}
</div>
</div>
@endsection

@include('section.footer')

