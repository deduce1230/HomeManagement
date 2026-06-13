<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Stocks\VwStock;
use App\Models\Stocks\Category;
use App\Models\Stocks\StockList;

class StockController extends Controller
{
    const MAX_UNIT = 9; //１つのカテゴリーグループで作れる数

    public function StockMenu()
    {
        return view('stocks.stock-edit-home'); 
    }


    public function ListAdmin( $gid )
    {//-- 在庫管理表示・編集画面

        // 0～9はカテゴリ0, 10～19はカテゴリ1・・・とする
        $cat_id = floor($gid/10) * 10;
        $max_id = $cat_id + self::MAX_UNIT;

        //gidチェック
        if ($gid % 10 > 0)
        {// １項目の表示
           $info        = VwStock::where('cat_id', $gid)
                            ->orderBy('id','asc')->get();
                         //   ->orderBy('cat_id','asc')->orderBy('expiry_at','asc')->get();
           $type_flg    = 1;//1項目表示
        }else{
         //カテゴリ全体の表示
           //$info        = VwStock::where('cat_id', '<' , $max_id)->get();
           $info        = VwStock::whereBetween('cat_id', [$cat_id , $max_id])
                            ->orderBy('cat_id','asc')->orderBy('id','asc')->get();
                          //  ->orderBy('cat_id','asc')->orderBy('expiry_at','asc')->get();
           $type_flg    = 0;//カテゴリ表示
        }
        //カテゴリ名
        //$cat0         = Category::where('cat_id', $cat_id)->get();
        //項目名
        $cat1         = Category::where('cat_id', $gid)->get();
        $items        = Category::whereBetween('cat_id', [$cat_id, $max_id])->get();

        //--サジェスト機能用
        $stock_name = new VwStock();
        $suggests = $stock_name->select(['stock_name'])->distinct()->whereBetween('cat_id', [$cat_id , $max_id])->get();
        //$suggests = $stock_name->whereBetween('cat_id', [$cat_id , $max_id])->get();
        //echo $suggests;


        return view('stocks.stock-edit-detail', ['stock_show_details' => $info, 
                                                 'stock_categories'    => $items ,
                                                 'type_flg'           => $type_flg,
                                                 'stock_name'          => $cat1[0],
                                                 'suggests'            => $suggests]);
    }

    public function list_save(Request $request)
    {//-- 在庫編集結果保存処理
        //-- 更新前にデータ削除
        if ($request->type_flg > 0){
            StockList::where('cat_id',    '=', $request->target_cat_id)->delete();
        }else{
            $cat_id = floor($request->target_cat_id/10) * 10;
            $max_id = $cat_id + self::MAX_UNIT;
            StockList::whereBetween('cat_id', [$cat_id + 1, $max_id])->delete();
        }

        $stock_data=array();

        $lp_cnt = 0;
        $cat_id     = array();
        $stock_name = array();
        $expiry_at  = array();
        $amount     = array();
        foreach ($request->all() as $key => $val){
           //echo $key . ":";
           //echo $val;
           //echo "<br>";

            if(strpos($key,'cat_name') !== false){ 
              $cat_id[$lp_cnt] = $val;
            }
            if(strpos($key,'stock_name') !== false){ 
              $stock_name[$lp_cnt] = $val;
            }
            if(strpos($key,'expiry') !== false){ 
              $expiry_at[$lp_cnt] = $val;
            }
            if(strpos($key,'amount') !== false){ 
              $amount[$lp_cnt] = $val;
              if ($request->type_flg > 0){
                //項目指定の場合、cat_nameが送られてこないので
                $cat_id[$lp_cnt] = $request->target_cat_id;
              }
              $lp_cnt++;
            }

        }

        //-- 更新 --
        for ($lp_cnt = 0; $lp_cnt < count($cat_id); $lp_cnt++){
            $savedata = [
                'cat_id'      => $cat_id[$lp_cnt],
                'stock_name'  => $stock_name[$lp_cnt],
                'expiry_at'   => $expiry_at[$lp_cnt],
                'amount'      => $amount[$lp_cnt],
            ];
            //print_r ($savedata);
            //echo "<br>";

            $db_data = new StockList;
            $db_data->fill($savedata)->save();

        }

        $rtn_url='/stock/list/'.strval($request->target_cat_id);
        return redirect($rtn_url)->with('poststatus', 'データを更新しました');


    }


}
