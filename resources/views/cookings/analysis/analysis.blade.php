@extends('layouts.common')
 
@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')

@section('pageCss')
  <link href="/css/hm_style_spinner.css" rel="stylesheet" type="text/css">

@include('section.head')
@include('section.header')
 
@section('content')
<!-- スピナー START-->
<div id="overlay">
    <div class="cv-copy">
        <h2>分析しています</h2>
        <p>画面を閉じないで下さい。</p>
    </div>
    <div class="cv-spinner">
        <span class="spinner"></span>
    </div>
</div>
<!-- スピナー END-->

<div class="container">
      <h6><a href='/cooking_index'>分析範囲設定</a></h6>
      <div class="item">
        <a class="btn btn-success" href="javascript:search_days(0)">1週間</a>
        <a class="btn btn-info"    href="javascript:search_days(1)">1カ月</a>
        <a class="btn btn-primary" href="javascript:search_days(2)">3カ月</a>
        <a class="btn btn-warning" href="javascript:search_days(3)">6カ月</a>
        <a class="btn btn-danger"  href="javascript:search_days(4)">1年</a>
      </div>
      <font color='red'>※1年の分析には10秒くらいかかります</font>

       <h5> <a href='/cooking_index'>料理分析結果（{{$target_date['start']}} ～ {{$target_date['end']}}）</a></h5>
       <div class="content">
           <canvas id="allChart"></canvas>
       </div>


       <script src="{{ mix('js/show_chart.js') }}"></script>
       <!-- piechart-outlabelsプラグインを呼び出す -->
       <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-piechart-outlabels"></script>

       <script>
           id = 'allChart';
           labels = @json($keys);
           data = @json($counts);
           backgroundColor = @json($bg_colors);
           borderColor = @json($bd_colors);
           make_chart(id,labels,data,backgroundColor,borderColor);
       </script>
    <div class="justify-content-start">
            <table class="table table-hover hm-table01">
                <caption><h5>
                            <div class="hm-div">
                                <div class="setLeft">
                                    <a href='/cooking_index'>料理種別記録</a>
                                </div>
                            </div>
                        </h5>
                </caption>
                <thead>
                <tr>
                    <th>食事日</th>
                    <th>料理種別</th>
                </tr>
                </thead>
                <tbody id="tbl">
                <?php $week = array( "日", "月", "火", "水", "木", "金", "土" ); ?>
                @foreach ($mealkind_days as $mealkind_day)
                    <tr>
                        <td  class="td-center" width='150'>
                            <a href='/cooking/search_calendar/{{$mealkind_day->meal_date}}/{{$mealkind_day->meal_date}}'>
                            {{ date('Y/m/d',strtotime($mealkind_day->meal_date)) }} ({{ $week[date("w",strtotime($mealkind_day->meal_date))] }})
                            </a>
                        </td>
                        <td class="td-no-left">
                            <a href='/cooking/search_calendar/{{$mealkind_day->meal_date}}/{{$mealkind_day->meal_date}}'>
                            {{ $mealkind_day->main_meal }}
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</div>

<script type="text/javascript">
function search_days(type){
// 選択した日付範囲でメニュー検索をかける
   var date_s = new Date()
   var date_e = new Date()

   // 引数で、１週間、１カ月・・・とURL用日付を作成する
   if (type === 0) {date_s.setDate(date_s.getDate() - 7);}
   if (type === 1) {date_s.setMonth(date_s.getMonth() - 1);}
   if (type === 2) {date_s.setMonth(date_s.getMonth() - 3);}
   if (type === 3) {date_s.setMonth(date_s.getMonth() - 6);}
   if (type === 4) {date_s.setMonth(date_s.getMonth() - 12);}

   // getMonthは、0～11なので、1を加える
   var date_s_month = date_s.getMonth() + 1;
   var date_e_month = date_e.getMonth() + 1;
   // 日付オブジェクトを再び文字列に変換する
   var date_s_new = date_s.getFullYear() + "-" + date_s_month + "-" + date_s.getDate()
   var date_e_new = date_e.getFullYear() + "-" + date_e_month + "-" + date_e.getDate()

   window.location.href='/cooking/analysis/' + date_s_new + '/' + date_e_new;
}
</script>

<!-- スピナー用くるくる START -->
<script>
$(".btn").click(function(){
    $("#overlay").fadeIn(500);
});
</script>
<!-- スピナー用くるくる END -->
@endsection
 
@include('section.footer')

