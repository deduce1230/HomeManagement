@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@section('pageCss')
@endsection

@include('section.head')
@include('section.header')

@section('content')

<div class="container">
    <h5> <a href='javascript:history.back();'>献立君ハッシュタグ検索</a></h5>
    @if (session('poststatus'))
        <div class="alert alert-success mt-4 mb-4">
            {{ session('poststatus') }}
        </div>
    @endif

    <form class="meal-input-form" method="post" action="/cooking/hashtag_search_exec" autocomplete="off">
      @csrf
      <p>
      <h6>ハッシュタグ一覧（検索するタグをタップしてください）</h6>
      <div class="meal-select">
        <?php $hashtag_id = 0; ?>
        @foreach ($hashtags as $hashtag)
          <?php $hashtag_id ++ ; ?>
          <input id="select{{ $hashtag_id }}" class="radio-inline__input" type="submit" name="hashtag_select" 
                 value="{{ $hashtag->hashtag }}" >
          <label class="radio-inline__label" for="select{{ $hashtag_id }}">#{{ $hashtag->hashtag }}</label>
        @endforeach
          <label-last></label-last>
      </div>


      </table>

      <div class="py-3">
          <a class="btn btn-secondary" href="javascript:history.back()">
                戻る
          </a>
      </div>
    </form>

</div>

@endsection
@include('section.footer')

