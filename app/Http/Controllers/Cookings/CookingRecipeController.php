<?php

namespace App\Http\Controllers\Cookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cookings\CookingRecipe;
use App\Http\Requests\Cookings\CookingRecipeRequest;

class CookingRecipeController extends Controller
{
    public function index()
    {
        $cooking_recipe = CookingRecipe::orderBy('rec_id', 'asc')->paginate(10);
        return view('cookings.settings.tables.cooking_recipe.index', ['cooking_recipes' => $cooking_recipe]);
    }

    public function create()
    {
        /**
         * 登録フォーム
         */
        return view('cookings.settings.tables.cooking_recipe.create');
    }

    public function store(CookingRecipeRequest $request)
    {
        //
        $savedata = [
            'rec_id'      => $request->rec_id,
            'recipe_id'   => $request->recipe_id,
            'ingredients' => $request->ingredients,
            'food_id'     => $request->food_id,
            'amount'      => $request->amount,
            'for_num'     => $request->for_num,
        ];

        $cooking_recipe = new CookingRecipe;
        $cooking_recipe->fill($savedata)->save();

        return redirect('/cooking/setting/table/cooking_recipe')->with('poststatus', '新規登録しました');

    }

    public function show($id)
    {
        //
    }

    /**
     * 編集画面
     */
    public function edit($rec_id)
    {
        $cooking_recipe = CookingRecipe::findOrFail($rec_id);
        return view('cookings.settings.tables.cooking_recipe.edit', ['record' => $cooking_recipe]);
    }


    /**
     * 編集実行
     */
    public function update(CookingRecipeRequest $request)
    {

        $cooking_recipe = CookingRecipe::where('rec_id', $request->rec_id)
            ->update(['recipe_id'   => $request->recipe_id,
                      'ingredients' => $request->ingredients,
                      'food_id'     => $request->food_id,
                      'amount'      => $request->amount,
                      'for_num'     => $request->for_num,
                     ]);

        return redirect('/cooking/setting/table/cooking_recipe')->with('poststatus', 'データを編集しました');
    }

    /**
     * 物理削除
     */
    public function destroy($id)
    {
        $cooking_recipe = CookingRecipe::findOrFail($id);

        $cooking_recipe->delete();

        return redirect('/cooking/setting/table/cooking_recipe')->with('poststatus', 'データを削除しました');
    }
}
