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
<div class="container row justify-content-start">
    @if (session('poststatus'))
        <div class="alert alert-success mt-4 mb-4">
            {{ session('poststatus') }}
        </div>
    @endif
            <table class="table table-hover hm-table01">
                <caption><h5>
                            <div class="hm-div">
                                <div class="setLeft">
                                    <a href='/'>スケジュール一覧(１カ月先まで表示)</a>
                                </div>
                            </div>
                        </h5>
                </caption>
                <thead>
                <tr>
                    <th style='width:85px'>日付</th>
                    <th style='width:80px'>開始時刻</th>
                    <th>スケジュール内容</th>
                    <th>対象</th>
                </tr>
                </thead>
                <tbody id="tbl">
                @foreach ($calendars as $calendar)
                    <?php
                        if (date('Y-m-d',strtotime($calendar->start_date)) >= date('Y-m-d'))
                        {
                           $future_chk="td-notyet";
                        }else{
                           $future_chk="";
                        }
                    ?>
                    <tr>
                        <td class="td-center {{ $future_chk }}" width=80px>
                        @if ( date('Y',strtotime($calendar->start_date))  !=  date('Y'))
                            {{ date('Y年',strtotime($calendar->start_date)) }} <br>
                        @endif
                        {{ date('m/d',strtotime($calendar->start_date)) }} 
                          <?php
                             $replace = [
                                          0 => '日',
                                          1 => '月',
                                          2 => '火',
                                          3 => '水',
                                          4 => '木',
                                          5 => '金',
                                          6 => '土',
                                        ];

                             echo '('.str_replace(array_keys($replace), array_values($replace), date('w',strtotime($calendar->start_date))).')';
                          ?>
                           @if ( date('Y-m-d',strtotime($calendar->start_date))  !=  date('Y-m-d',strtotime($calendar->end_date)))
                               - {{ date('m-d',strtotime($calendar->end_date)) }} 
                               ({{str_replace(array_keys($replace), array_values($replace), date('w',strtotime($calendar->end_date)))}})
                               <br>
                           @endif
                        </td>
                        <td class="td-center {{ $future_chk }}" width=80px>
                           {{ $calendar->start_time }}
                        </td>
                        <td class="td-no-left {{ $future_chk }}">
                         <?php
                            if(strpos($calendar->event,'[!]') !== false){
                              echo "<font color='red'>".str_replace('[!]','',$calendar->event)."</font>";
                            }else if (strpos($calendar->event,'[C]') !== false){
                              echo "<font color='gray'>".str_replace('[C]','',$calendar->event)."</font>";
                            }else {
                              echo $calendar->event;
                            }
                         ?>
                        </td>
                        <td class="td-center {{ $future_chk }}" width=80px>
                           {{ $calendar->owner }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
</div>
<div class="d-flex justify-content-center mb-5">
    {{ $calendars->links() }}
</div>
@endsection

@include('section.footer')
