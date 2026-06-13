@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')

@include('section.header')

@section('content')
<h5><a href='/'>書庫一覧(開発中)</a></h5>
<div class="container">
    <h6>防災一覧</h6>
    <div class="row justify-content-center">
        <ul class="hm">
             <li><a href="{{ route('bousaizyunbi_pdf') }}" target="_blank" rel="noopener noreferrer">防災準備チェックリスト</a></li>
             <li><a href="{{ route('suigaidosyasaigai_pdf') }}" target="_blank" rel="noopener noreferrer">水害・土砂災害に備えましょう</a></li>
             <li><a href="{{ route('wagayanosonae_pdf') }}" target="_blank" rel="noopener noreferrer">我が家の備え</a></li>
        </ul>
    </div>
    <h6>イベントスケジュール</h6>
    <div class="row justify-content-center">
        <ul class="hm">
             <li><a href="{{ route('bakery_timetable') }}" target="_blank" rel="noopener noreferrer">パン焼きスケジュール for 2022.11.20</a></li>
        </ul>
    </div>
    <h6>アネックス新聞</h6>
    <div class="row justify-content-center">
        <ul class="hm">
             <li><a href="{{ route('annex001') }}" target="_blank" rel="noopener noreferrer">Vol.001(2024.02.01発行)</a></li>
             <li><a href="{{ route('annex002') }}" target="_blank" rel="noopener noreferrer">Vol.002(2024.03.01発行)</a></li>
             <li><a href="{{ route('annex003') }}" target="_blank" rel="noopener noreferrer">Vol.003(2024.04.01発行)</a></li>
             <li><a href="{{ route('annex004') }}" target="_blank" rel="noopener noreferrer">Vol.004(2024.05.01発行)</a></li>
             <li><a href="{{ route('annex005') }}" target="_blank" rel="noopener noreferrer">Vol.005(2024.06.01発行)</a></li>
             <li><a href="{{ route('annex006') }}" target="_blank" rel="noopener noreferrer">Vol.006(2024.08.01発行)</a></li>
             <li><a href="{{ route('annex007') }}" target="_blank" rel="noopener noreferrer">Vol.007(2024.09.01発行)</a></li>
             <li><a href="{{ route('annex008') }}" target="_blank" rel="noopener noreferrer">Vol.008(2024.10.01発行)</a></li>
             <li><a href="{{ route('annex009') }}" target="_blank" rel="noopener noreferrer">Vol.009(2024.11.01発行)</a></li>
             <li><a href="{{ route('annex010') }}" target="_blank" rel="noopener noreferrer">Vol.010(2024.12.01発行)</a></li>
             <li><a href="{{ route('annex011') }}" target="_blank" rel="noopener noreferrer">Vol.011(2024.12.31発行)</a></li>
        </ul>
    </div>
    <h6>ねこぺん動画</h6>
    <div class="row justify-content-center">
        <ul class="hm">
             <li><a href="{{ route('neko001') }}" target="_blank" rel="noopener noreferrer">過ぎたるは猶</a></li>
        </ul>
    </div>
</div>
@endsection

@include('section.footer')
