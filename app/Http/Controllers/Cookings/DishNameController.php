<?php

namespace App\Http\Controllers\Cookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cookings\DishName;
use App\Http\Requests\Cookings\DishNameRequest;

class DishNameController extends Controller
{
    public function index()
    {
        $dish_name = DishName::orderBy('dish_id', 'asc')->paginate(10);
        return view('cookings.settings.tables.dish_name.index', ['dish_names' => $dish_name]);
    }

    public function create()
    {
        /**
         * 登録フォーム
         */
        return view('cookings.settings.tables.dish_name.create');
    }

    public function store(DishNameRequest $request)
    {
        //
        $savedata = [
            'dish_id' => $request->dish_id,
            'dish_nm' => $request->dish_nm,
            'kind_id' => $request->kind_id,
        ];

        $dish_name = new DishName;
        $dish_name->fill($savedata)->save();

        return redirect('/cooking/setting/table/dish_name')->with('poststatus', '新規登録しました');

    }

    public function show($id)
    {
        //
    }

    /**
     * 編集画面
     */
    public function edit($dish_id)
    {
        $dish_name = DishName::findOrFail($dish_id);
        return view('cookings.settings.tables.dish_name.edit', ['dish_name' => $dish_name]);
    }


    /**
     * 編集実行
     */
    public function update(DishNameRequest $request)
    {

        $dish_name = DishName::where('dish_id', $request->dish_id)
            ->update(['dish_nm' => $request->dish_nm,
                      'kind_id' => $request->kind_id]);

        return redirect('/cooking/setting/table/dish_name')->with('poststatus', 'データを編集しました');
    }

    /**
     * 物理削除
     */
    public function destroy($id)
    {
        $dish_name = DishName::findOrFail($id);

        $dish_name->delete();

        return redirect('/cooking/setting/table/dish_name')->with('poststatus', 'データを削除しました');
    }
}
