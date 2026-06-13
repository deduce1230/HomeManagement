@extends('layouts.common')
 
@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')
 
@include('section.header')
 
@section('content')
<div class="container">

  <script src="{{ mix('js/show_chart.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

  <h3><a href='javascript:history.back();'>直近天気予報({{ $weather_info['from'] }}～{{ $weather_info['to'] }})</a></h3>

  <script>
  //var ctx = document.getElementById("myLineChart").getContext("2d");
  var wea_temperature0 = <?php echo json_encode($weather0['temperature'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  var wea_humidity0    = <?php echo json_encode($weather0['humidity'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  var wea_hour0        = <?php echo json_encode($weather0['hour'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  var wea_temperature1 = <?php echo json_encode($weather1['temperature'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  var wea_humidity1    = <?php echo json_encode($weather1['humidity'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  var wea_hour1        = <?php echo json_encode($weather1['hour'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  </script>

  <h5> 今日（{{ $weather_info['from'] }}） </h5>
  <canvas id="canvas_today"></canvas>
  <table><tr>
      <?php
       foreach($weather0['weather'] as $weather_r){
           echo"<td class='td-center'><img src='". $weather_r ."'></id>";
       }
      ?>
      </tr><tr align='center'>
      <?php
       foreach($weather0['hour'] as $hour_r){
           echo"<td class='td-center'>". $hour_r . "時</id>";
       }
      ?>
      </tr>
  </table>

  <h6> 明日（{{ $weather_info['to'] }}） </h6>
  <canvas id="canvas_tommorrow"></canvas>
  <table><tr>
      <?php
       foreach($weather1['weather'] as $weather_r){
           echo"<td class='td-center'><img src='". $weather_r ."'></id>";
       }
      ?>
      </tr><tr align='center'>
      <?php
       foreach($weather1['hour'] as $hour_r){
           echo"<td class='td-center'>". $hour_r . "時</id>";
       }
      ?>
      </tr>
  </table>

  <script>
  window.onload = function() {
      ctx = document.getElementById("canvas_today").getContext("2d");
      window.myBar = new Chart(ctx, {
          type: 'bar', // ここは bar にする必要があります
          data: barChartData_today,
          options: complexChartOption
      });

      ctx2 = document.getElementById("canvas_tommorrow").getContext("2d");
      window.myBar = new Chart(ctx2, {
          type: 'bar', // ここは bar にする必要があります
          data: barChartData_tommorrow,
          options: complexChartOption
      });
  };
  </script>

<script>
// 表示データは「今日」と「明日」で分ける
var barChartData_today = {
    labels: wea_hour0,
    datasets: [
    {
        type: 'line',
        label: '気温',
        data: wea_temperature0,
        borderColor : "rgba(254,97,132,0.8)",
        backgroundColor : "rgba(254,97,102,0.2)",
        yAxisID: "y-axis-1",
    },
    {
        type: 'bar',
        label: '湿度',
        data: wea_humidity0,
        borderColor : "rgba(54,164,235,0.8)",
        backgroundColor : "rgba(54,164,235,0.5)",
        yAxisID: "y-axis-2",
    },
    ],
};

var barChartData_tommorrow = {
    labels: wea_hour1,
    datasets: [
    {
        type: 'line',
        label: '気温',
        data: wea_temperature1,
        borderColor : "rgba(254,97,132,0.8)",
        backgroundColor : "rgba(254,97,102,0.2)",
        yAxisID: "y-axis-1",
    },
    {
        type: 'bar',
        label: '湿度',
        data: wea_humidity1,
        borderColor : "rgba(54,164,235,0.8)",
        backgroundColor : "rgba(54,164,235,0.5)",
        yAxisID: "y-axis-2",
    },
    ],
};
</script>

<script>
// 軸の情報は「今日」も「明日」も共通
var complexChartOption = {
    responsive: true,
    scales: {
        yAxes: [{
            id: "y-axis-1",   // Y軸のID
            type: "linear",   // linear固定 
            position: "left", // どちら側に表示される軸か？
            ticks: {          // スケール
                max: 40,
                min: 0,
                stepSize:5 
            },
            scaleLabel: {
              display: true,
              labelString: '温度（度）'
            }
        }, {
            id: "y-axis-2",
            type: "linear", 
            position: "right",
            ticks: {
                max: 100,
                min: 0,
                stepSize: 10
            },
            scaleLabel: {
              display: true,
              labelString: '湿度（％）'
            }
        }],
    }
};
</script>




</div>

@endsection
 
@include('section.footer')

