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
        <a href="{{ route('meal_type.create') }}" class="btn btn-primary">
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
            <th>食事ID</th>
            <th>食事名</th>
            <th class="onlypc">更新日時</th>
            <th>処理</th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($meal_types as $meal_type)
            <form method="post" action="{{ route('meal_type.destroy', $meal_type->meal_id) }}">
            @csrf
            @method('DELETE')
            <tr>
                <td>{{ $meal_type->meal_id }}</td>
                <td>{{ $meal_type->meal_nm }}</td>
                <td class="onlypc">{{ $meal_type->updated_at->format('Y.m.d') }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('meal_type.edit', $meal_type->meal_id) }}" class="btn btn-success btn-sm">編集</a>
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
    {{ $meal_types->links() }}
</div>
</div>
@endsection

@include('section.footer')

