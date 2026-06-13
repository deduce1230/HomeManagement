@extends('layouts.common')
 
@section('title', 'HomeManagement Web')
@section('keywords', 'naoshi,yuko')
@section('description', '山下家の情報一括管理')
@include('section.head')
 
@include('section.header')
 
@section('content')
<div class="container">

<form action="/test/rows_post" method="post" autocomplete="off">
      @csrf
<table>
  <thead>
    <tr>
      <th>果物</th>
      <th>数量</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" name="fluit[0]" value="りんご"></td>
      <td><input type="number" name="quantity[0]" value="3"></td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="2"><button id="add_row" type="button">行追加</button></td>
    </tr>
  </tfoot>
</table>
<input type="hidden" name="row_length" value="1">
<input type="submit" name="send" value="送信">
</form>



<table border="1px">
    <thead>
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>性別</th>
            <th>上へ</th>
            <th>下へ</th>
            <th>削除</th>
            <th>追加</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>001</td>
            <td>山田太郎</td>
            <td>男</td>
            <td><button class="rowup">↑</button></td>
            <td><button class="rowdown">↓</button></td>
            <td><button class="rowdel">Del</button></td>
            <td><button class="rowins">＋</button></td>
        </tr>
        <tr>
            <td>002</td>
            <td>鈴木二郎</td>
            <td>男</td>
            <td><button class="rowup">↑</button></td>
            <td><button class="rowdown">↓</button></td>
            <td><button class="rowdel">Del</button></td>
            <td><button class="rowins">＋</button></td>
        </tr>
        <tr>
            <td>003</td>
            <td>高橋陽子</td>
            <td>女</td>
            <td><button class="rowup">↑</button></td>
            <td><button class="rowdown">↓</button></td>
            <td><button class="rowdel">Del</button></td>
            <td><button class="rowins">＋</button></td>
        </tr>
        <tr>
            <td>004</td>
            <td>山本三郎</td>
            <td>男</td>
            <td><button class="rowup">↑</button></td>
            <td><button class="rowdown">↓</button></td>
            <td><button class="rowdel">Del</button></td>
            <td><button class="rowins">＋</button></td>
        </tr>
    </tbody>
</table>

</div>

<script>
$(document).on('click', '#add_row', function(e) {
  var tr_row = '' +
  '<tr>' +
    '<td><input type="text" name="fluit" value=""></td>' +
    '<td><input type="number" name="quantity" value=""></td>' +
  '</tr>';// 挿入する行のテンプレート
  var row_cnt = $("table tbody").children().length;// 現在のDOMで表示されているtrの数
  $(':hidden[name="row_length"]').val(parseInt(row_cnt) + 1);// input type=hiddenに格納されている行数を変更
  $(tr_row).appendTo($('table > tbody'));// tbody末尾にテンプレートを挿入
  $('table > tbody > tr:last > td > input').each(function() {
    var base_name = $(this).attr('name');
    $(this).attr('name', base_name + '[' + row_cnt + ']');
  });// input name部分を変更
});
</script>


<script>
$('.rowup').click(function() {
 let $row = $(this).closest("tr");
 let $row_prev = $row.prev("tr");
 if($row.prev.length) {
     $row.insertBefore($row_prev);
 }
});
$('.rowdown').click(function() {
 let $row = $(this).closest("tr");
 let $row_next = $row.next("tr");
 if($row_next.length) {
     $row.insertAfter($row_next);
 }
});
$('.rowdel').click(function() {
 let row = $(this).closest("tr").remove();
 $(row).remove();
});
$('.rowins').click(function() {
 let $row = $(this).closest("tr");
 let $newRow = $row.clone(true);
 $newRow.insertAfter($row);
});

</script>
@endsection
 
@include('section.footer')

