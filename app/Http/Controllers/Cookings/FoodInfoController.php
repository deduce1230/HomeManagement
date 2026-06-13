<?php

namespace App\Http\Controllers\Cookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cookings\FoodInfo;
use App\Http\Requests\Cookings\FoodInfoRequest;

class FoodInfoController extends Controller
{
    public function index()
    {
        $food_info = FoodInfo::orderBy('group_num','asc')->orderBy('group_subname','asc')
                                                         ->orderBy('food_nm', 'asc')->paginate(10);
        return view('cookings.settings.tables.food_info.index', ['food_infos' => $food_info]);
    }

    public function create($pg_from, $food_target = '') 
    {
        /**
         * 登録フォーム
         */
        //-- レシピ名、URLともに合致するデータが存在しない(通常の新規登録）

        return view('cookings.settings.tables.food_info.create',['pg_from' => $pg_from, 'food_target' => $food_target]);
    }

    public function store(FoodInfoRequest $request)
    {
        //
        $maxFoodId = FoodInfo::max('food_id');
        $target_food_id = $maxFoodId + 1;

        $pg_from = $request->pg_from;
        $food_target = $request->food_target;

        $savedata = [
            'food_id'  => $target_food_id,
            'food_nm'  => $request->food_nm,
            'season_s' => $request->season_s,
            'season_e' => $request->season_e,
            'group_num'    => $request->group_num,
            'group_subname' => $request->group_subname,
            'memo'     => $request->memo,
        ];

        $food_info = new FoodInfo;
        $food_info->fill($savedata)->save();

        //return redirect('/cooking/setting/table/food_info')->with('poststatus', '新規登録しました');
        //return back()->with('poststatus', '新規登録しました');
        if ($pg_from > 0){
            //$back_url = '/cooking/show_detail/' . strval($pg_from);
            $back_url = '/cooking/search_alias/' . $food_target . '/' . strval($pg_from);
            return redirect( $back_url )->with('poststatus', '食材マスタを登録しました');
        }else{
            return back()->with('poststatus', '新規登録しました');
        }

    }

    public function show($id)
    {
        //
    }

    /**
     * 編集画面
     */
    public function edit($food_id, $pg_from)
    {
        $food_info = FoodInfo::findOrFail($food_id);
        return view('cookings.settings.tables.food_info.edit', ['pg_from' => $pg_from, 'food_info' => $food_info]);
    }


    /**
     * 編集実行
     */
    public function update(FoodInfoRequest $request)
    {

        $pg_from = $request->pg_from;

        $food_info = FoodInfo::where('food_id', $request->food_id)
            ->update(['food_nm'   =>$request->food_nm,
                      'season_s'  =>$request->season_s,
                      'season_e'  =>$request->season_e,
                      'group_num'    => $request->group_num,
                      'group_subname' => $request->group_subname,
                      'memo'     => $request->memo,
                     ]);

        //return redirect('/cooking/setting/table/food_info')->with('poststatus', 'データを編集しました');
        if ($pg_from > 0){
            $back_url = '/cooking/show_detail/' . strval($pg_from);
            return redirect( $back_url )->with('poststatus', '食材データを編集しました');
        }else{
            return back()->with('poststatus', 'データを編集しました');
        }
    }

    /**
     * 物理削除
     */
    public function destroy($id)
    {
        $food_info = FoodInfo::findOrFail($id);

        $food_info->delete();

        return redirect('/cooking/setting/table/food_info')->with('poststatus', 'データを削除しました');
    }
}
