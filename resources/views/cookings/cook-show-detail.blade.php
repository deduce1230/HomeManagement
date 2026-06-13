@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@section('pageCss')
  <link href="/css/lightbox/photos-style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/css/lightbox/lightbox.css">
  <link rel="stylesheet" href="/css/hm_modal.css">
  <script src="/js/lightbox/lightbox-plus-jquery.min.js"></script>
@endsection
@include('section.head')

@include('section.header')

@section('content')
<h5><a href='javascript:history.back();'>献立くん レシピ詳細</a></h5>
<!--
<div class="container row justify-content-start">
-->
    @if (session('poststatus'))
        <div class="alert alert-success mt-4 mb-4">
            {{ session('poststatus') }}
        </div>
    @endif
    <table class="table table-hover hm-table01 hm-table02">
        <thead>
        <tr>
            <th colspan=2>{{$cooking_info[0]->recipe_nm}}</th>
        </tr>
        </thead>
        <tbody id="tbl">
            <tr>
                <td class="td-center" colspan=2>
                    <?php 
//                       if (count($cooking_info) > 0)
//                          $img = "/photos/recipes/".$cooking_info[0]->recipe_id.".jpg";
//                          if (!file_exists("/opt/home-management/www/public".$img)) {
//                               $img = "/photos/recipes/0.jpg";
//                          }
                         $img = "/photos/recipes/0.jpg";

                         if (count($cooking_info) > 0) {
                             $candidate = "/photos/recipes/".$cooking_info[0]->recipe_id.".jpg";

                             if (file_exists(public_path($candidate))) {
                                 $img = $candidate;
                             }
                         }
                   ?>
                    <img src='{{$img}}'>
                </td>
            </tr>
        </tbody>
        <thead>
        <tr>
            <th>材料名</th>
            @if (count($cooking_show_details) > 0)
            <th>分量　{{$cooking_show_details[0]->for_num}}</th>
            @else
            <th>分量　</th>
            @endif
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($cooking_show_details as $cooking_show_detail)
            <tr>
<!--
                <td class="td-center openModal">
-->
                <td class="td-center" onclick="show_food_info('{{  $cooking_show_detail->ingredients }}')">
                    {{  $cooking_show_detail->ingredients }}
                </td>
                <td class="td-center" >
                    {{  $cooking_show_detail->amount }}
                </td>
            </tr>
        @endforeach
        @if (isset($cooking_info[0]->memo))
            <tr>
            <th colspan=2>メ　モ</th>
            </tr>
            <tr>
            <td colspan=2 class="td-left textarea-wide">{{ $cooking_info[0]->memo }}</td>
            </tr>
        @endif
        @if (strlen($cooking_info[0]->hashtag)>0)
            <tr>
            <th colspan=2>ハッシュタグ</th>
            </tr>
            <tr>
            <td colspan=2 class="td-left textarea-wide">{{ $cooking_info[0]->hashtag }}</td>
            </tr>
        @endif

    <tr><td class="td-center td-no-border" style="border: 0px none;"colspan=2>
         <a class="btn btn-success" href="/cooking/edit_detail/{{ $cooking_info[0]->recipe_id }}">
              　編　　集　 
         </a>
    </td></tr>
        </tbody>
    </table>



<!-- モーダルエリアここから -->
<section id="modalArea" class="modalArea">
  <div id="modalBg" class="modalBg"></div>
    <div class="modalWrapper">
      <div class="modalContents hm-div">
        <div class="setLeft">
          <h3 id="foodTitle"></h3>
        </div>
      </div>
      <div id="closeModal" class="closeModal">
        <i class="far fa-window-close"></i>
      </div>

      <span id="jsdLink" style='color:blue'></span>

      <p><span id="group_info"></span></p>

      <table id="tblNutuision" >
      </table>

      <div id="registButton">
      </div>
    </div>
  </div>
</section>
<!-- モーダルエリアここまで -->

<!-- modal用JavaScript --->
<script>
  $(function () {
//    $('.openModal').click(function(){
//        $('#modalArea').fadeIn();
//        get_data(1);
//    });
    $('#closeModal , #modalBg').click(function(){
      $('#modalArea').fadeOut();
    });
  });

  function show_food_info(food_nm){
        $('#modalArea').fadeIn();
        get_data(food_nm);
  };

  function get_data(food_nm){
    return $.ajax({
      url: "/cooking/food/" + String(food_nm),
      method: "GET",
    })
    .done(function(result) {
       //-- 食品名
       if (result[0]["nutuitions"]["jsd_name"] != ""){
           food_link='食品成分表：' + result[0]["nutuitions"]["jsd_name"];
       }else{
           food_link='';
       }

       $("#foodTitle").text(result[0]["data"]["name"]);
       $("#jsdLink").text(food_link);

       //--栄養素表示用テーブル
       var table = document.getElementById("tblNutuision");
       //--まずは全行削除
       while (table.rows.length > 0) table.deleteRow(0);

       //--食品群分類
       if (result[0]["data"]["group_num"]>0)
       {
           if (result[0]["data"]["group_subname"]){
               $("#group_info").text("第" + result[0]["data"]["group_num"] + "群　" + result[0]["data"]["group_subname"]);
           }else{
               $("#group_info").text("第" + result[0]["data"]["group_num"] + "群　（分類名：未登録）");
           }

       }else{
         $("#group_info").text("食品群分類不明");
       }

       var nutuitions = result[0]["nutuitions"]
       var row = table.insertRow(0);
       row.innerHTML = "<th colspan=2 style='background:teal; color:#FFF;'>100gあたりの栄養素</th>";
       //-- 行追加
       if (nutuitions["variable"])
       {//-- 栄養素のデータがある場合
         for (let i = 0; i < nutuitions["nutuition"].length; i++) {
           var row = table.insertRow(i+1);
           row.innerHTML = "<td>"+nutuitions["nutuition"][i]+"</td><td>" +
                           nutuitions["value"][i]+nutuitions["unit"][i]+"</td>";
           console.log(result[0]["nutuitions"]["nutuition"][i])
         }
         console.log(result[0]["data"])
       }else{
         //-- 栄養素データがない場合
         var row = table.insertRow(1);
         row.innerHTML = "<td> - 未入力 - </td><td> - 未入力 -</td>";
       }

       //-- 修正ボタンのURL指定 --
       var btnURL = document.getElementById("registButton");

       if (result[0]["data"]["variable"])
       {//-- マスタとしては存在する場合
           if (nutuitions["variable"]){
               //-- 栄養素データがある場合
               //btnURL.innerHTML = ""; 
               btnURL.innerHTML = "<a href='/cooking/setting/table/food_info/" + result[0]["data"]["food_id"] + 
                                  "/edit/{{ $cooking_info[0]->recipe_id }}'> " + 
                                  "<button type='button'>食品群修正</button> " +
                                  "</a> " +
                                  "<a href='/cooking/edit_foodnut/" + result[0]["data"]["food_id"] + 
                                  "/{{$cooking_info[0]->recipe_id}}'> " +
                                  "<button type='button'>栄養素修正</button> " +
                                  "</a> ";
           }else{
               //-- 栄養素データがない場合
               //btnURL.innerHTML = "<strong>栄養素情報未登録</strong>"; 
               btnURL.innerHTML = "<a href='/cooking/edit_foodnut/" + result[0]["data"]["food_id"] + 
                                  "/{{$cooking_info[0]->recipe_id}}'> " +
                                  "<button type='button'>栄養素登録</button> " +
                                  "</a>";
           }
       }else
       {//-- マスタとして存在しない or 別名ヒットしなかった場合
           btnURL.innerHTML = "<a href='/cooking/search_alias/" + result[0]["data"]["name"] + 
                              "/{{$cooking_info[0]->recipe_id}}'> " + 
                              "<button type='button'>別名登録</button> " +
                              "</a>";
       }

    }).fail(function(result) {
      console.log('ERROR');
    });
  }
</script>



<!--
</div>
-->
@endsection

@include('section.footer')
