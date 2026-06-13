@extends('layouts.common')
 
@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')
 
@include('section.header')
 
@section('content')
<div class="container">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"></script>

<div id="healthGraph">
<canvas id="canvas" ></canvas>
</div>

<!-- グラフ更新ボタン -->
<h6>表示期間指定</h6>
<div style="display:flex">
     <div>
        <input type="date" id="date_start" value='{{ $day_start }}'>
        ～
        <input type="date" id="date_end"   value='{{ $day_end }}'>
     </div>
</div>
<!--
<h6>表示対象者指定</h6>
<div style="display:flex">
     <div class="selectbox">
         <select id="target_user">
             <option value="1">直志</option>
             <option value="2">裕子</option>
         </select>
      </div>
</div>
-->
<h6>表示項目指定</h6>
<div class="meal-select">
    @foreach ($record_kinds as $record_kind)
       @if ($record_kind->id === 1)
         <?php $defalut_value = 'checked'; ?>
       @else
         <?php $defalut_value = ''; ?>
       @endif
         <input id="select{{ $record_kind->id }}" class="radio-inline__input" type="radio" name="target_kind"
             value="{{ $record_kind->id }}" {{$defalut_value}}>
         <label class="radio-inline__label" for="select{{ $record_kind->id }}">{{ $record_kind->group_name }}</label>
    @endforeach
         <label-last></label-last>
</div>

<button type="button" class="btn btn-primary" id="btn">グラフを表示</button>
<a class="btn btn-dark" id="recordBtn" href="/record/grid/{{$target_year}}/{{$target_month}}">
      記録入力画面の表示
</a>
<p>
</div>

<script>

    var chartData = [];

    // ページ読み込み時にグラフを描画
    drawChart(); // グラフ描画処理を呼び出す
    newChart();

    // ボタンをクリックしたら、AJAXでデータを取得し、グラフを再描画
    document.getElementById('btn').onclick = function() {

          newChart();

    }

    // グラフ描画処理総括
    function newChart() {
        // すでにグラフ（インスタンス）が生成されている場合は、グラフを破棄する
        if (myChart) {
            myChart.destroy();
        }

        // 対象ユーザーID取得
        var target_user_id = {{$user_id}};

        // 対象項目取得
        let elements = document.getElementsByName('target_kind');
        let len = elements.length;
        let checkValue = '';
        for (let i = 0; i < len; i++){
            if (elements.item(i).checked){
                checkValue = elements.item(i).value;
            }
        }

        // Ajaxによるデータ取得
        var obj_date_s = document.getElementById('date_start')
        var obj_date_e = document.getElementById('date_end')
        get_data(checkValue,  target_user_id,  obj_date_s.value,  obj_date_e.value);

        // グラフ表示のタイミングで、記録表時の対象画面のパラメータを変更する
        var t_date = new Date(obj_date_e.value);
        var t_month = t_date.getMonth()+1;
        //alert('/record/' + t_date.getFullYear() + '/' + t_month);
        $('#recordBtn').attr('href', '/record/grid/' + t_date.getFullYear() + '/' + t_month);
    }

    // グラフ描画処理
    function drawChart() {
        //console.log(chartData);
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myChart = new Chart(ctx, chartData);
    }

    function get_data(rec_kind, user_id, date_s, date_e){
        return $.ajax({
            url: "/record/chart/get_rec_data/" + rec_kind + "/" + date_s + "/" + date_e + "/" + user_id,
            method: "GET",
        })
        .done(function(result) {
    
            myChart.destroy();
    
            //chartData = result[0];
            chartData = result[0];
            //chartData = result[1];
            console.log(result[0]);
            //console.log(result[1]);
 
            drawChart(); // グラフを再描画

        }).fail(function(result) {
            console.log('ERROR');
        });
    }

    //-- CANVASサイズ調整 --
    var w = $('#healthGraph').width();
    var h = $('#healthGraph').height();
    if (w < 500)
    {
        h = 300;
    }else{
        h = 350;
    }
    $('#canvas').attr('width', w);
    $('#canvas').attr('height', h);
    $('#healthGraph').attr('height', h);

</script>


@endsection
 
@include('section.footer')

