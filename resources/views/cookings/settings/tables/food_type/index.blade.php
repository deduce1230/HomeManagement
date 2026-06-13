@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')


@section('content')
<div class="table-responsive">
    <h5> <a href='/cooking/setting/table'>マスタ管理　食材タイプマスタテーブル</a></h5>
    <div class="mt-4 mb-4">
        <a href="{{ route('food_type.create') }}" class="btn btn-primary">
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
            <th>食材タイプID</th>
            <th>食材タイプ名</th>
            <th class="onlypc">更新日時</th>
            <th>処理</th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($food_types as $food_type)
            <form method="post" action="{{ route('food_type.destroy', $food_type->type_id) }}">
            @csrf
            @method('DELETE')
            <tr>
                <td>{{ $food_type->type_id }}</td>
                <td>{{ $food_type->type_nm }}</td>
                <td class="onlypc">{{ $food_type->updated_at->format('Y.m.d') }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('food_type.edit', $food_type->type_id) }}" class="btn btn-success btn-sm">編集</a>
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
    {{ $food_types->links() }}
</div>
</div>
@endsection

@include('section.footer')

