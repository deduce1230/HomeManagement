<?php

namespace App\Http\Controllers\Cookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cookings\FoodType;
use App\Http\Requests\Cookings\FoodTypeRequest;

class FoodTypeController extends Controller
{
    public function index()
    {
        $food_type = FoodType::orderBy('type_id', 'asc')->paginate(10);
        return view('cookings.settings.tables.food_type.index', ['food_types' => $food_type]);
    }

    public function create()
    {
        /**
         * 登録フォーム
         */
        return view('cookings.settings.tables.food_type.create');
    }

    public function store(FoodTypeRequest $request)
    {
        //
        $savedata = [
            'type_id' => $request->type_id,
            'type_nm' => $request->type_nm,
        ];

        $food_type = new FoodType;
        $food_type->fill($savedata)->save();

        return redirect('/cooking/setting/table/food_type')->with('poststatus', '新規登録しました');

    }

    public function show($id)
    {
        //
    }

    /**
     * 編集画面
     */
    public function edit($type_id)
    {
        $food_type = FoodType::findOrFail($type_id);
        return view('cookings.settings.tables.food_type.edit', ['food_type' => $food_type]);
    }


    /**
     * 編集実行
     */
    public function update(FoodTypeRequest $request)
    {

        $food_type = FoodType::where('type_id', $request->type_id)
            ->update(['type_nm' => $request->type_nm]);

        return redirect('/cooking/setting/table/food_type')->with('poststatus', 'データを編集しました');
    }

    /**
     * 物理削除
     */
    public function destroy($id)
    {
        $food_type = FoodType::findOrFail($id);

        $food_type->delete();

        return redirect('/cooking/setting/table/food_type')->with('poststatus', 'データを削除しました');
    }
}
