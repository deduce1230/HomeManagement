@extends('layouts.common')
 
@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')
@include('section.header')
 
@section('content')
<script type="text/javascript" src="/js/hm_rec_script.js"></script>
<div class="container">
    <h1 class="text-center h1">Web Speech API テスト</h1>
    <div id="content">
      <input type="textarea" id="q" name="q" size=60>
      <a href="#" class="btn-real btn-real2" onclick="recording('q','favIcon2');">
          <i id="favIcon2" class="fas fa-microphone"></i>
      </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

</div>

@endsection
 
@include('section.footer')

