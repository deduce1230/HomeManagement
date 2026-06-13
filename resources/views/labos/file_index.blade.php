@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')
<script type="text/javascript" src="/js/hm_rec_script.js"></script>
@include('section.header')

@section('content')
<div class="container">
    {{ csrf_field() }}
    <h5> <a href='javascript:history.back();'>ファイルアップロード</a></h5>

	<form method="POST" action="/test/upload" enctype="multipart/form-data">

	<input type="file" id="file" name="file" class="form-control">
        <br>
	<button type="submit">アップロード</button>

	</form>

</div>
@endsection
@include('section.footer')

