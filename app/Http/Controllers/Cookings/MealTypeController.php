<?php

namespace App\Http\Controllers\Cookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cookings\MealType;
use App\Http\Requests\Cookings\MealTypeRequest;

class MealTypeController extends Controller
{
    public function index()
    {
        $meal_type = MealType::orderBy('meal_id', 'asc')->paginate(10);
        return view('cookings.settings.tables.meal_type.index', ['meal_types' => $meal_type]);
    }

    public function create()
    {
        /**
         * 登録フォーム
         */
        return view('cookings.settings.tables.meal_type.create');
    }

    public function store(MealTypeRequest $request)
    {
        //
        $savedata = [
            'meal_id' => $request->meal_id,
            'meal_nm' => $request->meal_nm,
        ];

        $meal_type = new MealType;
        $meal_type->fill($savedata)->save();

        return redirect('/cooking/setting/table/meal_type')->with('poststatus', '新規登録しました');

    }

    public function show($id)
    {
        //
    }

    /**
     * 編集画面
     */
    public function edit($meal_id)
    {
        $meal_type = MealType::findOrFail($meal_id);
        return view('cookings.settings.tables.meal_type.edit', ['meal_type' => $meal_type]);
    }


    /**
     * 編集実行
     */
    public function update(MealTypeRequest $request)
    {

        $meal_type = MealType::where('meal_id', $request->meal_id)
            ->update(['meal_nm' => $request->meal_nm]);

        return redirect('/cooking/setting/table/meal_type')->with('poststatus', 'データを編集しました');
    }

    /**
     * 物理削除
     */
    public function destroy($id)
    {
        $meal_type = MealType::findOrFail($id);

        $meal_type->delete();

        return redirect('/cooking/setting/table/meal_type')->with('poststatus', 'データを削除しました');
    }
}
