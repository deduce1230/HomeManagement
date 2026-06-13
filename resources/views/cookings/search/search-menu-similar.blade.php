@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@section('pageCss')
  <link href="/css/hm_style_spinner.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="/js/hm_rec_script.js"></script>
@endsection

@include('section.head')
@include('section.header')

@section('content')
<!-- スピナー START-->
<div id="overlay">
    <div class="cv-copy">
        <h2>検索しています</h2>
        <p>画面を閉じないで下さい。</p>
    </div>
    <div class="cv-spinner">
        <span class="spinner"></span>
    </div>
</div>
<!-- スピナー END-->

<div class="container">
    <h5> <a href='javascript:history.back();'>類似メニュー検索</a></h5>
    @if (session('poststatus'))
        <div class="alert alert-success mt-4 mb-4">
            {{ session('poststatus') }}
        </div>
    @endif

    <form class="meal-input-form" method="post" action="/cooking/similar_search_exec" autocomplete="off">
      @csrf
      <p>
      <h6>検索ワード（これに類似する過去のレシピを検索します）</h6>
      <table style="border:none;">
          <tr><td style="border:none;">
              <div class="inputWithIcon">
                  <input type="text"  id="search_word"  autocomplete=”on”
                         name="search_word" 
                         class="form-control  btn-input {{ $errors->has('search_word') ? 'is-invalid' : '' }}"
                         placeholder="メニュー名を記載してください">
                        @if ($errors->has('search_word'))
                            <div class="invalid-feedback">
                                {{ $errors->first('search_word') }}
                            </div>
                        @endif

                  <i class="fas fa-search fa-lg fa-fw" aria-hidden="true"></i>

              </div>
          </td><td width=20px style="border:none;">
              <a href="#" class="btn-real btn-real2" onclick="recording('search_word','micicon')">
                  <i id="micicon" class="fas fa-microphone"></i>
              </a>
          </td></tr>
      </table>

      <div class="py-3">
          <a class="btn btn-secondary" href="javascript:history.back()">
                戻る
          </a>
         <button type="submit" class="btn btn-primary">
               検索
         </button>

      </div>
    </form>

</div>

<!-- スピナー用くるくる START -->
<script>
$(".btn").click(function(){
    $("#overlay").fadeIn(500);
});
</script>
<!-- スピナー用くるくる END -->
@endsection
@include('section.footer')

