//*********************************************//
//***************table-management**************//
//*********************************************//
$(function(){
	p_tableDnD();
	p_tableShadow();
	// プラスボタンクリック時
	$(".PlusBtn").on('click',function(){
		// 番下へスクロール
		setTimeout(function() {
			window.scroll(0,$(document).height());
		},0);
		$(".table-management tbody tr:first-child").clone(true).appendTo(".table-management tbody");
		$(".table-management tbody tr:last-child td input").val("");
		// $(".table-management tbody tr:last-child td select option").atter("selected",false);
		p_tableDnD();
		p_tableShadow();
	});
	// マイナスボタンクリック時
	$(".MinusBtn").on('click',function(){
		// 行が2行以上あればクリックされた列を削除
		if ($(".table-management tbody tr").length >= 2) {
			$(this).parents('tr').remove();
			p_tableDnD();
			p_tableShadow();
		}
	});
// ドラッグアンドドロップ制御
	function p_tableDnD(){
		$(".table-management").tableDnD({
			dragHandle: ".handle"
		});
	}
// ドラッグアンドドロップ時に影を付ける
	function p_tableShadow(){
		$(".table-management tbody tr .handle").mousedown(function(){
			// 領域内で押した時
			$(this).parents('tr').css('box-shadow','2px 3px 6px 2px #9E9E9E');
			return false;
		})
		$(" * ").mouseup(function(){
			// 離した時
			$(".table-management tbody tr").css('box-shadow','none');
		});
	}
});
