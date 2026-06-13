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
                    食品成分表から「{{$food_target}}」の栄養登録
                     @if ($search_word)
                         <br>（{{$search_word}}で検索）
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


            <table class="table table-hover hm-table01">
                <thead>
                <tr>
                    <th colspan=2 >食品名</th>
                </tr>
                </thead>
                <tbody id="tbl">
                @foreach ($jsd_infos as $jsd_info)
                    <tr>
                        <td class="td-center td-no-right" style='width:100px'>
                          <a href="/cooking/get_nut_info/{{$food_id}}/{{$jsd_info->jsd_id}}/{{$pg_from}}" class="btn btn-success btn-sm">栄養登録</a>
                        </td>
                        <td class="td-left">
                         {{ $jsd_info->name }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
</div>
<div class="d-flex justify-content-center mb-5">
    {{ $jsd_infos->links() }}
</div>

<script type="text/javascript">
function search_master(){
   var search_word = document.getElementById("search_word");
   window.location.href='/cooking/nut_info/{{$food_id}}/{{$food_target}}/{{$pg_from}}/' + search_word.value;
}
</script>

@endsection

@include('section.footer')
