@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')

@include('section.head')
@include('section.header')

@section('content')
<div class="container mt-4">
    <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">
            食材栄養素情報の登録{{$jsd_name}}
        </h1>
        <div style='text-align: right;'>
            <a class="btn btn-secondary" href="/cooking/nut_info/{{ $food_id }}/{{ $food_name }}/{{ $pg_from }}">食品成分表から取得</a>
        </div>
        @if (mb_strlen($jsd_name) > 0)
            <strong><font color=blue>食品成分表「{{$jsd_name}}」から連携</center></font></strong><p>
            （修正すると、連携が切れます）<p>
        @endif
        <strong>100gあたりの栄養素を記入してください</strong><p>

        <form method="POST" action="/cooking/regist_foodnut">
            @csrf
            <input type="hidden" id="food_id" name="food_id"  value='{{ $food_id }}'    >
            <input type="hidden" id="pg_from" name="pg_from"  value='{{ $pg_from }}'    >

            <input type="hidden" id="jsd_link" name="jsd_link"  value='{{ $jsd_id }}'    >

            <fieldset class="mb-4">
                <div class="form-group">
                    <label for="subject">
                        食材名
                    </label>
                    <input
                        id="food_nm"
                        name="food_nm"
                        value="{{ $food_name }}"
                        type="text"
                        disabled="disabled" 
                    >
                </div>
                <div class="form-group">
                    <label for="subject">
                        カロリー ({{$food_nuts[1]['unit']}} )
                    </label>
                    <input
                        id="nut1"
                        name="nut1"
                        value="{{ $food_nuts[1]['value'] }}"
                        type="text"
                        onchange="exit_jsd_link()"
                    >
                    <input type="hidden" id="unit1" name="unit1"  value='{{$food_nuts[1]['unit']}}'    >
                </div>
                <div class="form-group">
                    <label for="subject">
                        たんぱく質 ({{$food_nuts[2]['unit']}} )
                    </label>
                    <input
                        id="nut2"
                        name="nut2"
                        value="{{ $food_nuts[2]['value'] }}"
                        type="text"
                        onchange="exit_jsd_link()"
                    >
                    <input type="hidden" id="unit2" name="unit2"  value='{{$food_nuts[2]['unit']}}'    >
                </div>
                <div class="form-group">
                    <label for="subject">
                        脂質 ({{$food_nuts[3]['unit']}} )
                    </label>
                    <input
                        id="nut3"
                        name="nut3"
                        value="{{ $food_nuts[3]['value'] }}"
                        type="text"
                        onchange="exit_jsd_link()"
                    >
                    <input type="hidden" id="unit3" name="unit3"  value='{{$food_nuts[3]['unit']}}'    >
                </div>
                <div class="form-group">
                    <label for="subject">
                        炭水化物 ({{$food_nuts[4]['unit']}} )
                    </label>
                    <input
                        id="nut4"
                        name="nut4"
                        value="{{ $food_nuts[4]['value'] }}"
                        type="text"
                        onchange="exit_jsd_link()"
                    >
                    <input type="hidden" id="unit4" name="unit4"  value='{{$food_nuts[4]['unit']}}'    >
                </div>
                <div class="form-group">
                    <label for="subject">
                        糖質 ({{$food_nuts[5]['unit']}} )
                    </label>
                    <input
                        id="nut5"
                        name="nut5"
                        value="{{ $food_nuts[5]['value'] }}"
                        type="text"
                        onchange="exit_jsd_link()"
                    >
                    <input type="hidden" id="unit5" name="unit5"  value='{{$food_nuts[5]['unit']}}'    >
                </div>
                <div class="form-group">
                    <label for="subject">
                        食物繊維 ({{$food_nuts[6]['unit']}} )
                    </label>
                    <input
                        id="nut6"
                        name="nut6"
                        value="{{ $food_nuts[6]['value'] }}"
                        type="text"
                        onchange="exit_jsd_link()"
                    >
                    <input type="hidden" id="unit6" name="unit6"  value='{{$food_nuts[6]['unit']}}'    >
                </div>
                <div class="form-group">
                    <label for="subject">
                        塩分 ({{$food_nuts[7]['unit']}} )
                    </label>
                    <input
                        id="nut7"
                        name="nut7"
                        value="{{ $food_nuts[7]['value'] }}"
                        type="text"
                        onchange="exit_jsd_link()"
                    >
                    <input type="hidden" id="unit7" name="unit7"  value='{{$food_nuts[7]['unit']}}'    >
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="javascript:page_back();">
                        戻る
                    </a>

                    <button type="submit" class="btn btn-primary">
                        登録する
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection

<script type="text/javascript">
function page_back(){
   var pg_from = document.getElementById("pg_from").value;
   if (pg_from > 0){
       window.location.href='/cooking/show_detail/' + pg_from;
   }else{
       history.back();
   }
}

  function exit_jsd_link() {
  //--値変更時に連携を切るための措置
    var jsd_llink = document.getElementById("jsd_link");
    jsd_link.value = '0';
  }
</script>

@include('section.footer')

