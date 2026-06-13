@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')


@section('content')
<div class="table-responsive">
    <h5> <a href='/cooking/setting/table'>マスタ管理　菜種マスタテーブル</a></h5>
    <div class="mt-4 mb-4">
        <a href="{{ route('meal_kind.create') }}" class="btn btn-primary">
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
            <th>菜種ID</th>
            <th>菜種名</th>
            <th class="onlypc">更新日時</th>
            <th>処理</th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($meal_kinds as $meal_kind)
            <form method="post" action="{{ route('meal_kind.destroy', $meal_kind->kind_id) }}">
            @csrf
            @method('DELETE')
            <tr>
                <td>{{ $meal_kind->kind_id }}</td>
                <td>{{ $meal_kind->kind_nm }}</td>
                <td class="onlypc">{{ $meal_kind->updated_at->format('Y.m.d') }}</td>
                <td class="text-nowrap">
                    <a href="{{ route('meal_kind.edit', $meal_kind->kind_id) }}" class="btn btn-success btn-sm">編集</a>
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
    {{ $meal_kinds->links() }}
</div>
</div>
@endsection

@include('section.footer')

