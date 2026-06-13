@extends('layouts.common')

@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@section('pageCss')
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
      <table style="border:none;">
          <tr>
              <td colspan=2 style="border:none;">
              <h5>
                 <a href='javascript:history.back();'>
                    「{{$food_target}}」の別名登録
                     @if ($search_word)
                         <br>（{{$search_word}}の検索）
                     @endif
                 </a>
              </h5>
              </td>
          </tr>
          <tr><td style="border:none;">
              <div class="inputWithIcon">
                  <input type="text"  id="search_word"  value="{{ $search_word ?: $food_target}}"
                         name="search_word" 
                         class="form-control btn-input"
                         placeholder="検索文字列">

                  <i class="fas fa-search fa-lg fa-fw" aria-hidden="true"></i>
              </div>
              </td>
              <td width=90px style="border:none;">
                  <a class="btn btn-success" href="javascript:search_master()">
                       簡易検索 
                  </a>
              </td>
          </tr>
      </table>
      注意）以下のマスタにない場合は、<a href='/cooking/setting/table/food_info/create/{{$recipe_id}}/{{$food_target}}'>[新規マスタ登録]</a>する必要があります。

            <table class="table table-hover hm-table01">
                <thead>
                <tr>
                    <th colspan=2 >食品名</th>
                    <th>食品群</th>
                    <th>分類名</th>
                </tr>
                </thead>
                <tbody id="tbl">
                @foreach ($food_infos as $food_info)
                    <tr>
                        <td class="td-center td-no-right" style='width:100px'>
                          <a href="/cooking/regist_alias/{{$food_info->food_id}}/{{$food_target}}/{{$recipe_id}}" class="btn btn-success btn-sm">別名登録</a>
                        </td>
                        <td class="td-center">
                         {{ $food_info->food_nm }}
                        </td>
                        <td class="td-center">
                        {{ $food_info->group_num }}
                        </td>
                        <td class="td-center">
                        {{ $food_info->group_subname }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
</div>
<div class="d-flex justify-content-center mb-5">
    {{ $food_infos->links() }}
</div>

<div class="d-flex justify-content-center mb-5">
    <a class="btn btn-secondary" href="javascript:page_back();">
         戻る
    </a>
</div>

<script type="text/javascript">
function search_master(){
   //-- 食材マスタからの検索
   var search_word = document.getElementById("search_word");
   window.location.href='/cooking/search_alias/{{$food_target}}/{{$recipe_id}}/' + search_word.value; 
}
function page_back(){
   //var pg_from = document.getElementById("pg_from").value;
   //if (pg_from > 0){
   //    window.location.href='/cooking/show_detail/' + pg_from;
   //}else{
   //    history.back();
  // }
   window.location.href='/cooking/show_detail/{{$recipe_id}}'; 
}
</script>
@endsection

@include('section.footer')
