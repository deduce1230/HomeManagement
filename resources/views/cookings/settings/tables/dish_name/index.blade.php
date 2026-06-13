@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')


@section('content')
<div class="table-responsive">
    <h5> <a href='/cooking/setting/table'>マスタ管理　料理名称マスタテーブル</a></h5>
    <div class="mt-4 mb-4">
        <a href="{{ route('dish_name.create') }}" class="btn btn-primary">
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
            <th>料理ID</th>
            <th>料理名</th>
            <th>菜種ID</th>
            <th class="onlypc">更新日時</th>
            <th>処理</th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($dish_names as $dish_name)
            <form method="post" action="{{ route('dish_name.destroy', $dish_name->dish_id) }}">
            @csrf
            @method('DELETE')
            <tr>
                <td>{{ $dish_name->dish_id }}</td>
                <td>{{ $dish_name->dish_nm }}</td>
                <td>{{ $dish_name->kind_id }}</td>
                <td class="onlypc">{{ $dish_name->updated_at->format('Y.m.d') }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('dish_name.edit', $dish_name->dish_id) }}" class="btn btn-success btn-sm">編集</a>
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
    {{ $dish_names->links() }}
</div>
</div>
@endsection

@include('section.footer')

