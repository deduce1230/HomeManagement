@extends('layouts.common')
 
@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')
 
@include('section.header')
 
@section('content')
<div class="container">
       <div class="content">
           <canvas id="allChart"></canvas>
       </div>

       <script src="{{ mix('js/show_chart.js') }}"></script>
       <script>
           id = 'allChart';
           labels = @json($keys);
           data = @json($counts);
           make_chart(id,labels,data);
       </script>

  <h1>折れ線グラフ</h1>
  <canvas id="myLineChart"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

  <script>
  var ctx = document.getElementById("myLineChart");
  var max_temp = <?php echo json_encode($weather['max_temp'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  var min_temp = <?php echo json_encode($weather['min_temp'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  var wea_date = <?php echo json_encode($weather['date'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: wea_date,
      datasets: [
        {
          label: '最高気温(度）',
          data: max_temp,
          borderColor: "rgba(255,0,0,1)",
          backgroundColor: "rgba(0,0,0,0)"
        },
        {
          label: '最低気温(度）',
          data: min_temp,
          borderColor: "rgba(0,0,255,1)",
          backgroundColor: "rgba(0,0,0,0)"
        }
      ],
    },
    options: {
      title: {
        display: true,
        text: '気温（8月1日~8月7日）'
      },
      scales: {
        yAxes: [{
          ticks: {
            suggestedMax: 40,
            suggestedMin: 0,
            stepSize: 10,
            callback: function(value, index, values){
              return  value +  '度'
            }
          }
        }]
      },
    }
  });
  </script>

  <h1>棒グラフ</h1>
  <canvas id="myBarChart"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

  <script>
  var ctx = document.getElementById("myBarChart");
  var data_max_temp = <?php echo json_encode($weather['max_temp'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  var data_wea_date = <?php echo json_encode($weather['date'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: data_wea_date,
      datasets: [
        {
          label: 'A店 来客数',
          data: data_max_temp,
          backgroundColor: "rgba(219,39,91,0.5)"
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: '支店別 来客数'
      },
      scales: {
        yAxes: [{
          ticks: {
            suggestedMax: 30,
            suggestedMin: 0,
            stepSize: 10,
            callback: function(value, index, values){
              return  value +  '度'
            }
          }
        }]
      },
    }
  });
  </script>
</div>

@endsection
 
@include('section.footer')

