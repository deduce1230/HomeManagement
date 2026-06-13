@extends('layouts.common')
 
@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')
 
@include('section.header')
 
@section('content')
<div class="container">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"></script>

<div style="width:100%">
  <canvas id="canvas" style="height:250px"></canvas>
</div>

<!-- グラフ更新ボタン -->
<h6>表示期間指定</h6>
<div style="display:flex">
     <div>
        <input type="date" id="date_start" value='{{ date('Y-m-d') }}'>
        ～
        <input type="date" id="date_end"   value='{{ date('Y-m-d') }}'>
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
<p>
</div>

<script>

    var chartData = [];


    var config = [];
        config = { // インスタンスをグローバル変数で生成
           // type: 'line',
            data: { // ラベルとデータセット
                labels: [1,2,3,4,5],
                //labels: rec1_dates,
                datasets: [
                          {  type: 'line',
                             data: [60,63,65,67,79], // グラフデータ
                             //data: chartVal, // グラフデータ
                             backgroundColor: 'rgb(0, 134, 197, 0.7)', // 棒の塗りつぶし色
                             borderColor: 'rgba(0, 134, 197, 1)', // 棒の枠線の色
                             borderWidth: 1, // 枠線の太さ
                             spanGaps: true,
                          },
                          ],

            },
            options: {
                       legend: {
                                 display: false, // 凡例を非表示
                               }
            }
        };
    //console.log(config);

    // ページ読み込み時にグラフを描画
    drawChart(); // グラフ描画処理を呼び出す


    // ボタンをクリックしたら、AJAXでデータを取得し、グラフを再描画
    document.getElementById('btn').onclick = function() {
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
    }

    function getValues() {
        chartVal = []; // 配列を初期化

        rec1_vals.forEach(function(elem, index) {
            //console.log(index + ': ' + elem);
            chartVal.push(elem);
        });
    }

    // グラフ描画処理
    function drawChart() {
        //console.log(chartData);
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myChart = new Chart(ctx, chartData);
        //window.myChart = new Chart(ctx, config);
    }

    function get_data(rec_kind, user_id, date_s, date_e){
        return $.ajax({
            url: "/record/chart/get_rec_data/" + rec_kind + "/" + date_s + "/" + date_e + "/" + user_id,
            method: "GET",
        })
        .done(function(result) {
    
            myChart.destroy();
    
            chartData = result[0];
            //chartData = result[1];
            console.log(chartData);
 
            drawChart(); // グラフを再描画

        }).fail(function(result) {
            console.log('ERROR');
        });
    }

</script>

@endsection
 
@include('section.footer')

