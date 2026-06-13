  function get_data(type){
    return $.ajax({
      url: "/"+type+"/hashtag/get",
      method: "GET",
    })
    .done(function(result) {

       //--ハッシュタグ表示用テーブル
       var table = document.getElementById("tblHashtags");
       //--まずは全行削除
       while (table.rows.length > 0) table.deleteRow(0);

       //--タグの存在確認
       if (result["hashtag"]<1)
       {
         $("#group_info").text("まだハッシュタグはありません");
       }

       var hashtags = result[0]['hashtag'];
       var row = table.insertRow(0);
       row.innerHTML = "<th colspan=2 class='modalHeader'>ハッシュタグ一覧</th>";
       //-- 行追加

         for (let i = 0; i < hashtags.length; i++) {
           var row = table.insertRow(i+1);
           row.innerHTML = "<td>#"+hashtags[i]+"</td>" +
                           "<td style='width:60px'><button onClick=\"addTag('" + hashtags[i] +"')\">選 択"+"</button></td>";
           console.log(hashtags[i])
         }

       //-- 新規追加ボタンのURL指定 --
       var btnURL = document.getElementById("registButton");
       btnURL.innerHTML = "<div>新しく作成する場合は、下のボタンを押して、「#」の隣にタグ名を入力してください</div>" +
                          "<button onClick='addHash()'>ハッシュタグ新規追加</button>";

    }).fail(function(result) {
      console.log('ERROR');
    });
  }

  function addTag(hashtag)
  {
    var hashtagArea = document.getElementById('hashtag');
    hashtagArea.value = hashtagArea.value + " #" + hashtag;
    $('#modalArea').fadeOut();
  }
  function addHash(){
    var hashtagArea = document.getElementById('hashtag');
    hashtagArea.value = hashtagArea.value + " #";
    $('#modalArea').fadeOut();

  }

