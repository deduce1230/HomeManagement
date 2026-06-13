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
            <a href='javascript:history.back()'>一言日記検索結果一覧{{$message}}</a>
        </div>
        <div class="setRight">
            <a href="/hm_twitter/tweet_search" class="btn-real">
                 <i class="fas fa-search"></i>
            </a>
        </div>
    </div>
</h5>
<h6>検索ワード：{{$searched_word}}</h6>
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
        @foreach ($search_result as $diary_show)
            <tr>
                <td class="td-center" >
                    @if ( date('Y',strtotime($diary_show->tweet_date))  !=  date('Y'))
                        {{ date('Y年',strtotime($diary_show->tweet_date)) }} <br>
                    @endif
                    {{ date('m/d',strtotime($diary_show->tweet_date)) }} ({{ $diary_show->weekday }})
                </td>

                <td class="td-left td-no-rightleft">
                @if (file_exists(public_path('/photos/diary/diary'.$diary_show->rec_id.'.jpg')))
                        <a href="{{ htmlspecialchars('/photos/diary/diary'.$diary_show->rec_id.'.jpg') }}" data-lightbox="pics" >
                             <img src="{{ htmlspecialchars('/photos/diary/diary'.$diary_show->rec_id.'.jpg') }}">
                        </a><br>
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
                @else
                        <p>
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
                        </p>
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


<!--
</div>
-->
@endsection

@include('section.footer')
