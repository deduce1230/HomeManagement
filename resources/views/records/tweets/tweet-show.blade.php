@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@section('pageCss')
  <link href="/css/lightbox/photos-style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/css/lightbox/lightbox.css">
  <script src="/js/lightbox/lightbox-plus-jquery.min.js"></script>
@endsection
@include('section.head')

@include('section.header')

@section('content')
<h5>
    <div class="hm-div">
        <div class="setLeft">
            <a href='javascript:history.back()'>{{$messages}}</a>
        </div>
        <div class="setRight">
            <a href="/hm_twitter/tweet_search" class="btn-real">
                 <i class="fas fa-search"></i>
            </a>
        </div>
    </div>
</h5>
<!--
<div class="container row justify-content-start">
-->
    @if (session('poststatus'))
        <div class="alert alert-success mt-4 mb-4">
            {{ session('poststatus') }}
        </div>
    @endif
    <table class="table table-hover hm-table01">
        <thead>
        <tr>
            <th colspan=1>日付</th>
            <th colspan=2>一言</th>
        </tr>
        </thead>
        <tbody id="tbl">
        <?php $row_cnt =0; ?>
        @foreach ($diary_shows as $diary_show)
            <tr>
                <?php $row_cnt ++; ?>
                @if ($diary_show->tweet_date_order === $diary_show->tweet_date_count || $row_cnt % 10 === 1)
                <td class="td-center" rowspan = {{ $diary_show->tweet_date_order }}>
                    @if ( date('Y',strtotime($diary_show->tweet_date))  !=  date('Y')) 
                        {{ date('Y年',strtotime($diary_show->tweet_date)) }} <br>
                    @endif 
                    {{ date('m/d',strtotime($diary_show->tweet_date)) }} ({{ $diary_show->weekday }})
                </td>
                @endif

                <td class="td-left td-no-rightleft">
@php
    $displayPath = '/photos/diary/diary' . $diary_show->rec_id . '.jpg';
    $originalPath = '/photos/diary/original/diary' . $diary_show->rec_id . '.jpg';
    $displayFull = public_path($displayPath);
    $originalFull = public_path($originalPath);
@endphp

@if (file_exists($displayFull))
    @if (file_exists($originalFull))
        <a href="{{ $originalPath }}" data-lightbox="pics">
    @else
        <a href="{{ $displayPath }}" data-lightbox="pics">
    @endif
        <img src="{{ $displayPath }}">
    </a><br>
@endif

@if ($diary_show->ref_url != "")
    <a href='{{ $diary_show->ref_url }}' target='blank'>
@endif
    {{ $diary_show->tweet }}
    @if ($diary_show->hashtag != "")
        <br><font color='gray'>{{ $diary_show->hashtag }}</font>
    @endif
@if ($diary_show->ref_url != "")
    </a>
@endif
                </td>
                <td class="td-center td-no-left">
                    <a href="/hm_twitter/tweet_edit/{{ $diary_show->rec_id }}" class="btn-real">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

<div class="d-flex justify-content-center mb-5">
    {{ $diary_shows->links() }}
</div>
<!--
</div>
-->
@endsection

@include('section.footer')
