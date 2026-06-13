<?php

namespace App\Http\Controllers\Cookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cookings\MealCategory;
use App\Http\Requests\Cookings\MealCategoryRequest;

class MealCategoryController extends Controller
{
    public function index()
    {
        $meal_category = MealCategory::orderBy('cat_id', 'asc')->paginate(10);
        return view('cookings.settings.tables.meal_category.index', ['meal_categorys' => $meal_category]);
    }

    public function create()
    {
        /**
         * 登録フォーム
         */
        return view('cookings.settings.tables.meal_category.create');
    }

    public function store(MealCategoryRequest $request)
    {
        //
        $savedata = [
            'cat_id' => $request->cat_id,
            'cat_nm' => $request->cat_nm,
        ];

        $meal_category = new MealCategory;
        $meal_category->fill($savedata)->save();

        return redirect('/cooking/setting/table/meal_category')->with('poststatus', '新規登録しました');

    }

    public function show($id)
    {
        //
    }

    /**
     * 編集画面
     */
    public function edit($cat_id)
    {
        $meal_category = MealCategory::findOrFail($cat_id);
        return view('cookings.settings.tables.meal_category.edit', ['meal_category' => $meal_category]);
    }


    /**
     * 編集実行
     */
    public function update(MealCategoryRequest $request)
    {

        $meal_category = MealCategory::where('cat_id', $request->cat_id)
            ->update(['cat_nm' => $request->cat_nm]);

        return redirect('/cooking/setting/table/meal_category')->with('poststatus', 'データを編集しました');
    }

    /**
     * 物理削除
     */
    public function destroy($id)
    {
        $meal_category = MealCategory::findOrFail($id);

        $meal_category->delete();

        return redirect('/cooking/setting/table/meal_category')->with('poststatus', 'データを削除しました');
    }
}

