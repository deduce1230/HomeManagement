<?php

namespace App\Http\Controllers\Cookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cookings\FoodList;
use App\Http\Requests\Cookings\FoodListRequest;

class FoodListController extends Controller
{
    public function index()
    {
        $food_list = FoodList::orderBy('list_id', 'asc')->paginate(10);
        return view('cookings.settings.tables.food_list.index', ['food_lists' => $food_list]);
    }

    public function create()
    {
        /**
         * 登録フォーム
         */
        return view('cookings.settings.tables.food_list.create');
    }

    public function store(FoodListRequest $request)
    {
        //
        $savedata = [
            'list_id' => $request->list_id,
            'list_nm' => $request->list_nm,
            'list_type' => $request->list_type,
        ];

        $food_list = new FoodList;
        $food_list->fill($savedata)->save();

        return redirect('/cooking/setting/table/food_list')->with('poststatus', '新規登録しました');

    }

    public function show($id)
    {
        //
    }

    /**
     * 編集画面
     */
    public function edit($list_id)
    {
        $food_list = FoodList::findOrFail($list_id);
        return view('cookings.settings.tables.food_list.edit', ['food_list' => $food_list]);
    }


    /**
     * 編集実行
     */
    public function update(FoodListRequest $request)
    {

        $food_list = FoodList::where('list_id', $request->list_id)
            ->update(['list_nm' => $request->list_nm,
                      'list_type' => $request->list_type]);

        return redirect('/cooking/setting/table/food_list')->with('poststatus', 'データを編集しました');
    }

    /**
     * 物理削除
     */
    public function destroy($id)
    {
        $food_list = FoodList::findOrFail($id);

        $food_list->delete();

        return redirect('/cooking/setting/table/food_list')->with('poststatus', 'データを削除しました');
    }
}
