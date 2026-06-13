<?php

namespace App\Http\Controllers\Cookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cookings\Cooking;
use App\Http\Requests\Cookings\CookingRequest;

class CookingController extends Controller
{
    public function index()
    {
        $cooking = Cooking::orderBy('recipe_id', 'asc')->paginate(10);
        return view('cookings.settings.tables.cooking.index', ['cookings' => $cooking]);
    }

    public function create()
    {
        /**
         * 登録フォーム
         */
        return view('cookings.settings.tables.cooking.create');
    }

    public function store(CookingRequest $request)
    {
        //
        $savedata = [
            'recipe_id'   => $request->recipe_id,
            'recipe_nm'   => $request->recipe_nm,
            'ref_url'     => $request->ref_url,
            'recommend'   => $request->recommend,
            'dish_id'     => $request->dish_id,
        ];

        $cooking = new Cooking;
        $cooking->fill($savedata)->save();

        return redirect('/cooking/setting/table/cooking')->with('poststatus', '新規登録しました');

    }

    public function show($id)
    {
        //
    }

    /**
     * 編集画面
     */
    public function edit($recipe_id)
    {
        $cooking = Cooking::findOrFail($recipe_id);
        return view('cookings.settings.tables.cooking.edit', ['record' => $cooking]);
    }


    /**
     * 編集実行
     */
    public function update(CookingRequest $request)
    {

        $cooking = Cooking::where('recipe_id', $request->recipe_id)
            ->update(['recipe_nm'  => $request->recipe_nm,
                      'ref_url'    => $request->ref_url,
                      'recommend'  => $request->recommend,
                      'dish_id'    => $request->dish_id,
                     ]);

        return redirect('/cooking/setting/table/cooking')->with('poststatus', 'データを編集しました');
    }

    /**
     * 物理削除
     */
    public function destroy($id)
    {
        $cooking = Cooking::findOrFail($id);

        $cooking->delete();

        return redirect('/cooking/setting/table/cooking')->with('poststatus', 'データを削除しました');
    }
}
